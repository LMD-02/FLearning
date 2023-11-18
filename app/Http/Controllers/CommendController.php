<?php

namespace App\Http\Controllers;

use App\Mail\ReportMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CommendController extends Controller
{
    public function index(Request $request){
        $data = 0;
        $session = DB::table('sessions')->get();
        if($request->data){
            $data = $request->data;
        }
        if($data == 0){
            $user = DB::table('table_commends')->paginate(12);
            foreach ($user as $each){
                $each->user = DB::table('users')->where('id', $each->user_id)->first();
                $each->session = DB::table('sessions')->where('id', $each->session_id)->first();
                $each->chapter = DB::table('chapters')->where('id', $each->session->chapter_id)->first();
                $each->subject = DB::table('subjects')->where('id', $each->chapter->subject_id)->first();
            }
        }else{
            $user = DB::table('table_commends')->where('session_id',$data)->paginate(12);
            foreach ($user as $each){
                $each->user = DB::table('users')->where('id', $each->user_id)->first();
                $each->session = DB::table('sessions')->where('id', $each->session_id)->first();
                $each->chapter = DB::table('chapters')->where('id', $each->session->chapter_id)->first();
                $each->subject = DB::table('subjects')->where('id', $each->chapter->subject_id)->first();
            }
        }
        return view('manager.user.command',[
            'title' => 'Quản lý bình luận',
            'data' => $user,
            'sessionData' => $session
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
        $report = DB::table('reports')->where('id', $id)->first();
        return view('manager.user.reportDetail',[
            'title' => 'Phản hồi chi tiết',
            'data' => $report,
        ]);
    }

    public function delete(Request $request){
        $id = $request->get('id');
        DB::table('table_commends')->where('id', $id)->delete();
        return redirect()->route('admin.user.command');
    }

    public function send(Request $request){
        $id = $request->get('id');

        $report = DB::table('reports')->where('id', $id)->first();

        $responseData = [
            'name' => $report->name,
            'title' => $report->title,
            'mess' => $request->mess,
        ];

        // Gửi email
        Mail::to($report->email)->send(new ReportMail($responseData));

        DB::table('reports')->where('id', $id)->update([
            'status' => 1
        ]);

        return redirect()->route('admin.report');
    }

    public  function update(Request $request){
        DB::table('table_commends')->insert([
            'user_id' => auth()->user()->id,
            'session_id' => $request->get('session_id'),
            'content' => $request->get('content'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return response()->json([
            'status' => 1,
        ]);
    }
}
