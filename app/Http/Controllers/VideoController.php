<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function index(Request $request){
        $data = DB::table('videos')->paginate(20);

        return view('manager.subject.video',[
            'title' => 'Quản lý video bài giảng',
            'data' => $data
        ]);
    }

    public function create(Request $request){

        return view('manager.subject.create_video',[
            'title' => 'Tạo video bài giảng',
        ]);
    }

    public function store(Request $request){
        $name = $request->get('name');
        $link = $request->get('link');

        $arr = [
            'name' => $name,
            'link' => $link,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('videos')->insert($arr);


        return redirect()->route('admin.subject.video');

    }



    public function edit(Request $request){
        $id = $request->get('id');
        $subject = DB::table('sessions')->where('id', $id)->first();
        $links = json_decode($subject->links,true);
        $subject->link1 = $links[0] ?? null;
        $subject->link2 = $links[1] ?? null;
        $subject->link3 = $links[2] ?? null;
        return view('manager.subject.edit_session',[
            'title' => 'Sửa buổi học ',
            'data' => $subject,
            'id' => $id

        ]);
    }

    public function delete(Request $request){
        $id = $request->get('id');
        DB::table('chapters')->where('id', $id)->delete();
        return redirect()->route('admin.subject.chapter');
    }

    public function update(Request $request)
    {
        $id = $request->get('id');

        $name = $request->get('name');
        $link1 = $request->get('link1') ?? null;
        $link2 = $request->get('link2') ?? null;
        $link3 = $request->get('link3') ?? null;
        $detail = $request->get('detail');

        $dataLink = [
            $link1,
            $link2,
            $link3,
        ];
        if (request()->has('image'))
        {
            $image     = request()->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/upload'), 'images/upload/' . $imageName);
            $arr = [
                'name' => $name,
                'image' => $imageName,
                'links' => json_encode($dataLink),
                'detail' => json_encode($detail),
            ];
            DB::table('sessions')->where('id',$id)->update($arr);
        }else{
            $arr = [
                'name' => $name,
                'links' => json_encode($dataLink),
                'detail' => json_encode($detail),
            ];
            DB::table('sessions')->where('id',$id)->update($arr);
        }
        return redirect()->route('admin.subject.chapter');
    }
}
