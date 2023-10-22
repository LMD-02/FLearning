<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $subject = DB::table('subjects')->where('status',0)->get();
    return view('student.welcome',[
        'subject' => $subject
    ]);
});

Route::get('/subject', function (Request $request) {
    $subject = DB::table('subjects')->where('status',0)->get();
    $chapter = DB::table('chapters')->where('subject_id',$request->id)->get();
    $subjectName = DB::table('subjects')->where('id',$request->id)->first()->name;

    foreach ($chapter as $key => $value) {
        $listSession = DB::table('sessions')->where('chapter_id',$value->id)->get();
        $value->listSession = $listSession;
        $value->countSession = $listSession->count();
    }
    return view('student.subject.index',
        [
            'chapter' => $chapter,
            'subject' => $subject,
            'subjectName' => $subjectName,
        ]
    );
})->name('student.subject');


Route::get('/session', function (Request $request) {
    $subject = DB::table('subjects')->where('status',0)->get();
    $session = DB::table('sessions')->where('id',$request->id)->first();
    $session->chapeter = DB::table('chapters')->where('id',$session->chapter_id)->first();
    $session->subject = DB::table('subjects')->where('id',$session->chapeter->subject_id)->first();
    return view('student.session.index',[
        'subject' => $subject,
        'session' => $session,
    ]);
})->name('student.session');




Route::get('/exam', function () {
    $subject = DB::table('subjects')->where('status',0)->get();

    return view('student.exam.index',[
        'subject' => $subject
    ]);
});
Route::get('/exam/detail', function () {
    $subject = DB::table('subjects')->where('status',0)->get();
    $data = DB::table('exams')->first();
    $exam = json_decode($data->details,true);

    return view('student.exam.detail',[
        'exam' => $exam,
        'subject' => $subject
    ]);
})->name('student.exam.detail');

Route::post('/exam/check', function (Request $request) {
    $data = DB::table('exams')->first();
    $exam = json_decode($data->details,true);
        $numberCorrect = 0;
        foreach ($exam['data'] as $key => $question) {
                if($question['c'] == $request['q'.$key]){
                    $numberCorrect++;
                }
        }
        dd(        'Đúng ' . $numberCorrect  .'/'.$exam['count'] .  ' câu.  Điểm số: '. $numberCorrect/$exam['count'] * 10   . " điểm");
//    return view('student.exam.index');
})->name('student.exam.check');



Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('manager.index',[
            'title' => 'Trang chủ'
        ]);
    })->name('admin.home');

    Route::get('/user', function () {
        $user = DB::table('users')->where('role',1)->paginate(20);
        return view('manager.user.index',[
            'title' => 'Quản lý người dùng',
            'data' => $user
        ]);
    })->name('admin.user');

    Route::get('/user/create', function () {
        return view('manager.user.userCreate',[
            'title' => 'Tạo người dùng',
        ]);
    })->name('admin.user.create');

    Route::get('/user/store', function () {
        return view('manager.user.index',[
            'title' => 'Tạo người dùng',
        ]);
    })->name('admin.user.store');

    Route::get('/user/edit', function () {
        return view('manager.user.index',[
            'title' => 'Tạo người dùng',
        ]);
    })->name('admin.user.edit');

    Route::get('/user/update', function () {
        return view('manager.user.index',[
            'title' => 'Tạo người dùng',
        ]);
    })->name('admin.user.update');





    Route::get('/user/report', function () {
        return view('manager.user.report',[
            'title' => 'Quản lý phản hồi'
        ]);
    })->name('admin.user.report');

    Route::get('/user/command', function () {
        return view('manager.user.command',[
            'title' => 'Quản lý bình luận'
        ]);
    })->name('admin.user.command');

    Route::get('/subject',[App\Http\Controllers\SubjectController::class, 'index'])->name('admin.subject');
    Route::get('/subject/create',[App\Http\Controllers\SubjectController::class, 'create'])->name('admin.subject.create');
    Route::post('/subject/store',[App\Http\Controllers\SubjectController::class, 'store'])->name('admin.subject.store');
    Route::get('/subject/updateStatus',[App\Http\Controllers\SubjectController::class, 'updateStatus'])->name('admin.subject.updateStatus');
    Route::get('/subject/edit',[App\Http\Controllers\SubjectController::class, 'edit'])->name('admin.subject.edit');
    Route::post('/subject/update',[App\Http\Controllers\SubjectController::class, 'update'])->name('admin.subject.update');
    Route::get('/subject/delete',[App\Http\Controllers\SubjectController::class, 'delete'])->name('admin.subject.delete');

    Route::get('/subject/chapter',[App\Http\Controllers\ChapterController::class, 'index'])->name('admin.subject.chapter');
    Route::get('/subject/chapter/create',[App\Http\Controllers\ChapterController::class, 'create'])->name('admin.chapter.create');
    Route::post('/subject/chapter/store',[App\Http\Controllers\ChapterController::class, 'store'])->name('admin.chapter.store');
    Route::get('/subject/chapter/edit',[App\Http\Controllers\ChapterController::class, 'edit'])->name('admin.chapter.edit');
    Route::post('/subject/chapter/update',[App\Http\Controllers\ChapterController::class, 'update'])->name('admin.chapter.update');
    Route::get('/subject/chapter/delete',[App\Http\Controllers\ChapterController::class, 'delete'])->name('admin.chapter.delete');





    Route::get('/subject/session',[App\Http\Controllers\SessionController::class, 'index'])->name('admin.subject.session');
    Route::get('/subject/session/create',[App\Http\Controllers\SessionController::class, 'create'])->name('admin.session.create');
    Route::post('/subject/session/store',[App\Http\Controllers\SessionController::class, 'store'])->name('admin.session.store');
    Route::get('/subject/session/edit',[App\Http\Controllers\SessionController::class, 'edit'])->name('admin.session.edit');
    Route::post('/subject/session/update',[App\Http\Controllers\SessionController::class, 'update'])->name('admin.session.update');
    Route::get('/subject/session/delete',[App\Http\Controllers\SessionController::class, 'delete'])->name('admin.session.delete');












    Route::get('/subject/video', function () {
        return view('manager.subject.video',[
            'title' => 'Quản lý video bài giảng'
        ]);
    })->name('admin.subject.video');



    Route::get('/exam', function () {
        $exams = DB::table('exams')->paginate(20);
        return view('manager.exam.index',[
            'title' => 'Quản lý bài kiểm tra',
            'exams' => $exams,
        ]);
    })->name('admin.exam');

    Route::get('/exam/create', function () {
        return view('manager.exam.create',[
            'title' => 'Tạo bài kiểm tra'
        ]);
    })->name('admin.exam.create');

    Route::post('/exam/store', function (Request $request) {
       $name = $request->exam_name;
       $count = $request->count;
       $arrData = [];
       for($i = 1; $i <= $count; $i++){
            $arr = [
                'q' => $request[$i.'_q'],
                'a1' => $request[$i.'_a1'],
                'a2' => $request[$i.'_a2'],
                'a3' => $request[$i.'_a3'],
                'a4' => $request[$i.'_a4'],
                'c' => $request[$i.'_c'],
            ];
           $arrData[] = $arr;
       }

       $arrInsert = [
           'title' => $name,
           'count' => $count,
           'data'  => $arrData
       ];
       DB::table('exams')->insert([
          'details' => json_encode($arrInsert),
          'created_at' => now(),
          'updated_at' => now(),
       ]);
        return view('manager.exam.index',[
            'title' => 'Quản lý bài kiểm tra'
        ]);
    })->name('admin.exam.store');

    Route::get('/exam/edit',function (Request $request){
        $id = $request->id;
        $data = DB::table('exams')->where('id',$id)->first();
        $exam = json_decode($data->details,true);

        return view('manager.exam.edit',[
            'title' => 'Sửa bài kiểm tra',
            'exam' => $exam,
            'id' => $id,
        ]);
    })->name('admin.exam.edit');

    Route::post('/exam/store', function (Request $request) {
        $name = $request->exam_name;
        $count = $request->count;
        $arrData = [];
        for($i = 1; $i <= $count; $i++){
            $arr = [
                'q' => $request[$i.'_q'],
                'a1' => $request[$i.'_a1'],
                'a2' => $request[$i.'_a2'],
                'a3' => $request[$i.'_a3'],
                'a4' => $request[$i.'_a4'],
                'c' => $request[$i.'_c'],
            ];
            $arrData[] = $arr;
        }

        $arrInsert = [
            'title' => $name,
            'count' => $count,
            'data'  => $arrData
        ];
        DB::table('exams')->where('id',$request->id)->update([
            'details' => json_encode($arrInsert),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.exam');
    })->name('admin.exam.update');

});
