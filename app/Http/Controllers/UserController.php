<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request){
        $user = DB::table('users')->where('role','!=',1)->paginate(12);
        return view('manager.user.index',[
            'title' => 'Quản lý người dùng',
            'data' => $user
        ]);
    }

    public function create(Request $request){
        return view('manager.user.userCreate',[
            'title' => 'Tạo người dùng '
        ]);
    }

    public function store(Request $request){

        if(request()->has('image')) {
            $image = request()->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/upload'), 'images/upload/'.$imageName);
        }
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password') ?? '123456';
        $role = $request->get('role');
        $phone = $request->get('phone');
        $address = $request->get('address');
        $birthday = $request->get('date');
        $gender = $request->get('gender');

        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'role' => $role,
            'phone' => $phone,
            'address' => $address,
            'birthday' => $birthday,
            'avatar' => $imageName,
            'gender' => $gender,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        return redirect()->route('admin.user');

    }

    public function updateStatus(Request $request){
        $id = $request->get('id');
        $status = $request->get('status');
        DB::table('subjects')->where('id', $id)->update([
            'status' => $status
        ]);
        return redirect()->route('admin.subject');
    }

    public function edit(Request $request){
        $id = $request->get('id');
        $subject = DB::table('users')->where('id', $id)->first();
        return view('manager.user.edit',[
            'title' => 'Sửa môn học',
            'data' => $subject,
        ]);
    }

    public function delete(Request $request){
        $id = $request->get('id');
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('admin.user');
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        $email = $request->get('email');
        $role = $request->get('role');
        $phone = $request->get('phone');
        $address = $request->get('address');
        $birthday = $request->get('date');
        $gender = $request->get('gender');
        if (request()->has('image') && request()->file('image')->isValid())
        {
            $image     = request()->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/upload'), 'images/upload/' . $imageName);


            $arr = [
                'name' => $name,
                'email' => $email,
                'role' => $role,
                'phone' => $phone,
                'address' => $address,
                'birthday' => $birthday,
                'avatar' => $imageName,
                'gender' => $gender,
                'updated_at' => now()
            ];

            DB::table('users')->where('id', $id)->update($arr);
        }else{
            $arr = [
                'name' => $name,
                'email' => $email,
                'role' => $role,
                'phone' => $phone,
                'address' => $address,
                'birthday' => $birthday,
                'gender' => $gender,
                'updated_at' => now()
            ];
            DB::table('users')->where('id', $id)->update($arr);
        }
        return redirect()->route('admin.user');
    }
}
