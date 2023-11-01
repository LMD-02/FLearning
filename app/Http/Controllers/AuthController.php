<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(request $request)
    {
        $message = $request->get('errors');
        $messageSuccess = $request->get('success');

        return view('auth.login', [
            'message' => $message ?? null,
            'messageSuccess' => $messageSuccess ?? null
        ]);
    }

    public function register(Request $request)
    {
        $message = $request->get('errors');

        return view('auth.register', [
            'message' => $message ?? null
        ]);
    }

    public function registerCheck(Request $request)
    {
        $data = $request->all();
        $name = $request->get('name');
        if ($name == null)
        {
            return redirect()->route('register', ['errors' => 'Tên không được để trống']);
        }
        $email = $request->get('email');
        if ($email == null)
        {
            return redirect()->route('register', ['errors' => 'Email không được để trống']);
        }
        $userCheck = DB::table('users')->where('email', $email)->first();
        if ($userCheck != null)
        {
            return redirect()->route('register', ['errors' => 'Email đã tồn tại']);
        }
        $password = $request->get('password');
        if ($password == null)
        {
            return redirect()->route('register', ['errors' => 'Mật khẩu không được để trống']);
        }
        $gender = $request->get('gender');
        if ($gender == null)
        {
            return redirect()->route('register', ['errors' => 'Giới tính không được để trống']);
        }
        $phone = $request->get('phone');
        if ($phone == null)
        {
            return redirect()->route('register', ['errors' => 'Số điện thoại không được để trống']);
        }
        $address = $request->get('address');
        if ($address == null)
        {
            return redirect()->route('register', ['errors' => 'Địa chỉ không được để trống']);
        }
        $birthday = $request->get('birthdate');
        if ($birthday == null)
        {
            return redirect()->route('register', ['errors' => 'Ngày sinh không được để trống']);
        }

        DB::table('users')->insert([
            'name'  => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'address' => $address,
            'phone' => $phone,
            'birthday' => $birthday,
            'avatar' => 'images/avatar/role2.png',
            'gender' => $gender,
            'role' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('login', ['success' => 'Đăng ký thành công']);

    }

    public function authCheck(Request $request)
    {
        session()->start();
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($request->only(['email', 'password'])))
        {
            Auth::login(auth()->user());
            if (auth()->user()->role === 0)
            {
                return redirect()->route('student.welcome');
            }
            else
            {
                session()->put('user', auth()->user());
                return redirect()->route('admin.home');
            }
        }

        return redirect()->route('login', ['errors' => 'Sai tài khoản hoặt mật khẩu']);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('login');
    }
}
