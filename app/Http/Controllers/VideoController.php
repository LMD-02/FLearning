<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function index(Request $request){
        $data1 = $request->data ?? 0;
        $subjectData = DB::table('subjects')->get();
        if($data1 == 0){
            $data = DB::table('videos')->paginate(12);
        }else{
            $data = DB::table('videos')->where('subject_id',$data1)->paginate(12);
        }
        foreach ($data as $each){
            $each->subject = DB::table('subjects')->where('id', $each->subject_id)->first();
        }

        return view('manager.subject.video',[
            'title' => 'Quản lý video bài giảng',
            'data' => $data,
            'subjects' => $subjectData
        ]);
    }

    public function create(Request $request){
        $subject = DB::table('subjects')->get();
        return view('manager.subject.create_video',[
            'title' => 'Tạo video bài giảng',
            'subject' => $subject
        ]);
    }

    public function store(Request $request){
        $name = $request->get('name');
        $link = $request->get('link');
        $subject_id = $request->get('subject');
        if(request()->has('image')) {
            $image = request()->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/upload'), 'images/upload/'.$imageName);
        }
        $arr = [
            'name' => $name,
            'link' => $link,
            'subject_id' => $subject_id,
            'image' => $imageName,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('videos')->insert($arr);


        return redirect()->route('admin.subject.video');

    }



    public function edit(Request $request){
        $id = $request->get('id');
        $data = DB::table('videos')->where('id', $id)->first();
        $subject = DB::table('subjects')->get();
        return view('manager.subject.edit_video',[
            'title' => 'Sửa video ',
            'data' => $data,
            'subject' => $subject
        ]);
    }

    public function delete(Request $request){
        $id = $request->get('id');
        DB::table('videos')->where('id', $id)->delete();
        return redirect()->route('admin.subject.video');
    }

    public function update(Request $request)
    {
        $id = $request->get('id');

        $name = $request->get('name');
        $link = $request->get('link');
        $subject_id = $request->get('subject');
        if (request()->has('image'))
        {
            $image     = request()->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/upload'), 'images/upload/' . $imageName);
            $arr = [
                'name' => $name,
                'link' => $link,
                'subject_id' => $subject_id,
                'image' => $imageName,
                'updated_at' => now(),
            ];
            DB::table('videos')->where('id', $id)->update($arr);
            return redirect()->route('admin.subject.video');
        }else{
            $arr = [
                'name' => $name,
                'link' => $link,
                'subject_id' => $subject_id,
                'updated_at' => now(),
            ];
            DB::table('videos')->where('id', $id)->update($arr);
            return redirect()->route('admin.subject.video');
        }

    }
}
