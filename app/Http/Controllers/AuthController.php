<?php

namespace App\Http\Controllers;


use App\Mail\ForgotEmail;
use http\Env\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function forgot()
    {
        return view('auth.forgot');
    }

    public function forgot2(Request $request)
    {
        $email = $request->get('email');
        $user  = DB::table('users')->where('email', $email)->first();
        if ($user == null)
        {
            return redirect()->route('forgot', ['errors' => 'Email không tồn tại']);
        }
        $data = [
            'hash_id' => Str::random(10),
            'user_id' => $user->id,
        ];
        $check = DB::table('tokens')->where('user_id', $user->id)->first();
        if ($check != null)
        {
            DB::table('tokens')->where('user_id', $user->id)->delete();
        }

        DB::table('tokens')->insert($data);
        $link = route('forgot3', ['hash_id' => $data['hash_id']]);

        $responseData = [
            'name' => $user->name,
            'link' => $link,
        ];

        // Gửi email
        Mail::to($email)->send(new ForgotEmail($responseData));

        return redirect()->route('forgot', ['success' => 'Vui lòng kiểm tra email để lấy lại mật khẩu']);

    }

    public function updatePass(Request $request){
        $password = $request->get('password');
        $repassword = $request->get('repassword');
        $userId = $request->get('user_id');

        $user = DB::table('users')->where('id', $userId)->first();
        if ($password != $repassword)
        {
            return redirect()->route('forgot2', ['email' => $user->email, 'errors' => 'Mật khẩu không trùng khớp']);
        }
        DB::table('users')->where('id', $user->id)->update([
            'password' => bcrypt($password)
        ]);
        DB::table('tokens')->where('user_id', $userId)->delete();
        return redirect()->route('login', ['success' => 'Đổi mật khẩu thành công']);
    }

    public function formForgot(Request $request){
        $hash = $request->get('hash_id');
        $token = DB::table('tokens')->where('hash_id', $hash)->first();
        if ($token == null)
        {
            return redirect()->route('forgot', ['errors' => 'Link không tồn tại']);
        }
        $user = DB::table('users')->where('id', $token->user_id)->first();
        return view('auth.forgot2', [
            'user' => $user
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
            'name'       => $name,
            'email'      => $email,
            'password'   => bcrypt($password),
            'address'    => $address,
            'phone'      => $phone,
            'birthday'   => $birthday,
            'avatar'     => 'images/avatar/role2.png',
            'gender'     => $gender,
            'role'       => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('login', ['success' => 'Đăng ký thành công']);

    }

    public function authCheck(Request $request)
    {
        session()->start();
        $this->validate($request, [
            'email'    => 'required',
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

    public function login(request $request)
    {
        $message        = $request->get('errors');
        $messageSuccess = $request->get('success');

        return view('auth.login', [
            'message'        => $message ?? null,
            'messageSuccess' => $messageSuccess ?? null
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('login');
    }
}
