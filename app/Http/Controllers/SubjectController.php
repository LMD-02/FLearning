<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function index(Request $request){
        $subject = DB::table('subjects')->paginate(20);
        return view('manager.subject.index',[
            'title' => 'Quản lý môn học',
            'data' => $subject
        ]);
    }

    public function create(Request $request){
        return view('manager.subject.create_subject',[
            'title' => 'Tạo môn học'
        ]);
    }

    public function store(Request $request){

        if(request()->has('image')) {
            $image = request()->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/upload'), 'images/upload/'.$imageName);
        }
        $name = $request->get('name');

        DB::table('subjects')->insert([
            'name' => $name,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.subject');

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
        $subject = DB::table('subjects')->where('id', $id)->first();
        return view('manager.subject.edit_subject',[
            'title' => 'Sửa môn học',
            'data' => $subject,
        ]);
    }

    public function delete(Request $request){
        $id = $request->get('id');
        DB::table('subjects')->where('id', $id)->delete();
        return redirect()->route('admin.subject');
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        if (request()->has('image'))
        {
            $image     = request()->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/upload'), 'images/upload/' . $imageName);
            DB::table('subjects')->where('id', $id)->update([
                'name'  => $request->get('name'),
                'image' => $imageName,
            ]);
        }else{
            DB::table('subjects')->where('id', $id)->update([
                'name'  => $request->get('name'),
            ]);
        }
        return redirect()->route('admin.subject');
    }
}
