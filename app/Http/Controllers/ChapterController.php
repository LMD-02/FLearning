<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChapterController extends Controller
{
    public function index(Request $request){
        $subject = DB::table('chapters')->paginate(12);
        foreach ($subject as $item){
            $item->count = DB::table('sessions')->where('chapter_id', $item->id)->count();
        }
        return view('manager.subject.chapter',[
            'title' => 'Quản lý chương',
            'data' => $subject
        ]);
    }

    public function create(Request $request){
        $subject = DB::table('subjects')->get();
        return view('manager.subject.create_chapter',[
            'title' => 'Tạo chương học',
            'subject' => $subject
        ]);
    }

    public function store(Request $request){
        $name = $request->get('name');
        $description = $request->get('description');
        $subject_id = $request->get('subject');

        DB::table('chapters')->insert([
            'name' => $name,
            'subject_id' => $subject_id,
            'description' => $description,
        ]);

        return redirect()->route('admin.subject.chapter');

    }



    public function edit(Request $request){
        $id = $request->get('id');
        $subject = DB::table('chapters')->where('id', $id)->first();
        $data = DB::table('subjects')->get();
        return view('manager.subject.edit_chapter',[
            'title' => 'Sửa chương học',
            'data' => $subject,
            'subject' => $data
        ]);
    }

    public function delete(Request $request){
        $id = $request->get('id');
        DB::table('chapters')->where('id', $id)->delete();
        return redirect()->route('admin.subject.chapter');
    }

    public function update(Request $request)
    {
        DB::table('chapters')->where('id', $request->get('id'))->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'subject_id' => $request->get('subject'),
        ]);
        return redirect()->route('admin.subject.chapter');
    }
}
