<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/forgot', [AuthController::class, 'forgot'])->name('forgot');

Route::post('/forgot2', [AuthController::class, 'forgot2'])->name('forgot2');

Route::post('/updatePass', [AuthController::class, 'updatePass'])->name('updatePass');

Route::get('/forgot3', [AuthController::class, 'formForgot'])->name('forgot3');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/registerCheck', [AuthController::class, 'registerCheck'])->name('registerCheck');
Route::post('/login/check', [AuthController::class, 'authCheck'])->name('authCheck');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/favourite/update', [App\Http\Controllers\FavouriteController::class, 'update'])->name('favourite.save');
Route::post('/comment/update', [App\Http\Controllers\CommendController::class, 'update'])->name('comment.save');

Route::get('/favorites', function (Request $request)
{
    $user      = auth()->user();
    $subject   = DB::table('subjects')->where('status', 0)->get();
    $favorites = DB::table('favorites')->where('user_id', $user->id)->get();
    foreach ($favorites as $key => $value)
    {
        $session           = DB::table('sessions')->where('id', $value->session_id)->first();
        $session->chapeter = DB::table('chapters')->where('id', $session->chapter_id)->first();
        $session->subject  = DB::table('subjects')->where('id', $session->chapeter->subject_id)->first();
        $favorites[$key]   = $session;
    }
    return view('student.favorites.index', [
        'subject'   => $subject,
        'favorites' => $favorites
    ]);
})->name('student.favorites');

Route::get('/subjects', function (Request $request)
{

    $subject  = DB::table('subjects')->paginate(12);

    return view('student.subject.all', [
        'subject' => $subject,
    ]);
})->name('student.subjects');
Route::get('/videos', function (Request $request)
{
    $paginate = 4;
    if(isset($request->data)){
        $subject = DB::table('subjects')->where('status', 0)->where('id',$request->data)->get();
        $paginate = 20;
    }else{
        $subject = DB::table('subjects')->where('status', 0)->get();
    }
    $videos  = DB::table('videos')->get();
    foreach ($subject as $each)
    {
        $each->videos = DB::table('videos')->where('subject_id', $each->id)->paginate($paginate);
    }
    return view('student.video.index', [
        'subject' => $subject,
        'videos'  => $videos
    ]);
})->name('student.video');

Route::get('/video/detail', function (Request $request)
{
    $video   = DB::table('videos')->where('id', $request->id)->first();
    $subject = DB::table('subjects')->where('status', 0)->get();
    $another = DB::table('videos')->where('subject_id', $video->subject_id)->where('id', '!=', $video->id)->get();

    return view('student.video.detail', [
        'subject' => $subject,
        'video'   => $video,
        'more'    => $another
    ]);
})->name('student.video.detail');


Route::get('/', function ()
{
    $subject = DB::table('subjects')->where('status', 0)->get();
    return view('student.welcome', [
        'subject' => $subject
    ]);
})->name('student.welcome');

Route::get('/subject', function (Request $request)
{
    $subject     = DB::table('subjects')->where('status', 0)->get();
    $chapter     = DB::table('chapters')->where('subject_id', $request->id)->get();
    $subjectName = DB::table('subjects')->where('id', $request->id)->first()->name;

    foreach ($chapter as $key => $value)
    {
        $listSession         = DB::table('sessions')->where('chapter_id', $value->id)->get();
        $value->listSession  = $listSession;
        $value->countSession = $listSession->count();
    }
    return view('student.subject.index',
        [
            'chapter'     => $chapter,
            'subject'     => $subject,
            'subjectName' => $subjectName,
        ]
    );
})->name('student.subject');

Route::get('/profile', function ()
{
    if (auth()->user() == null)
    {
        return redirect()->route('login');
    }
    $subject = DB::table('subjects')->where('status', 0)->get();
    return view('student.profile.index', [
        'subject' => $subject,
        'title'   => 'Thông tin cá nhân'
    ]);
})->name('student.profile');

Route::post('/profile/update', function (Request $request)
{
    $userId = auth()->user()->id;
    if($request->has('image')) {
        $image = request()->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/upload'), 'images/upload/'.$imageName);
        DB::table('users')->where('id', $userId)->update([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'birthday'   => $request->birthday,
            'updated_at' => now(),
            'gender'     => $request->gender,
            'avatar' => $imageName
        ]);
    }else{
        DB::table('users')->where('id', $userId)->update([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'birthday'   => $request->birthday,
            'updated_at' => now(),
            'gender'     => $request->gender
        ]);
    }
    return response()->json([
        'status'  => 1,
        'message' => 'Cập nhật thành công'
    ]);
})->name('student.profile.update');

Route::post('/profile/update/pass', function (Request $request)
{
    $userId = auth()->user()->id;
    $oldPass = $request->old_password;
    if (Hash::check($oldPass, auth()->user()->password)){
        DB::table('users')->where('id', $userId)->update([
           'password' => bcrypt($request->password)
        ]);
        return response()->json([
            'status'  => 1,
            'message' => 'Cập nhật thành công'
        ]);
    }
    return response()->json([
        'status'  => -1,
        'message' => 'Mật khẩu cũ của bạn không đúng'
    ]);
})->name('student.profile.pass');

Route::get('/session', function (Request $request)
{
    $user = auth()->user();
    if ($user != null)
    {
        $favourite = DB::table('favorites')
            ->where('session_id', $request->id)
            ->where('user_id', $user->id)->first();
        if ($request->list == true)
        {
            $comments = DB::table('table_commends')
                ->where('session_id', $request->id)
                ->get();
        }
        else
        {
            $comments = DB::table('table_commends')
                ->where('session_id', $request->id)
                ->paginate(5);

        }

        foreach ($comments as $key => $value)
        {
            $value->user = DB::table('users')->where('id', $value->user_id)->first();
        }
    }
    $subject           = DB::table('subjects')->where('status', 0)->get();
    $session           = DB::table('sessions')->where('id', $request->id)->first();
    $another = DB::table('sessions')->where('chapter_id', $session->chapter_id)->where('id', '!=', $session->id)->get();
    $session->chapeter = DB::table('chapters')->where('id', $session->chapter_id)->first();
    $session->subject  = DB::table('subjects')->where('id', $session->chapeter->subject_id)->first();
    return view('student.session.index', [
        'subject'   => $subject,
        'session'   => $session,
        'favourite' => $favourite ?? null,
        'comments'  => $comments ?? null,
        'more'     =>  $another ?? null,
    ]);
})->name('student.session');


Route::get('/exam', function ()
{
    $subject = DB::table('subjects')->where('status', 0)->get();
    $exam    = DB::table('exams')->get();
    foreach ($exam as $value)
    {
        $value->data = json_decode($value->details, true);
    }

    return view('student.exam.index', [
        'subject' => $subject,
        'exam'    => $exam
    ]);
})->name('student.exam');
Route::get('/exam/detail', function ()
{
    $subject = DB::table('subjects')->where('status', 0)->get();
    $data    = DB::table('exams')->where('id', request()->id)->first();
    $exam    = json_decode($data->details, true);

    return view('student.exam.detail', [
        'data'    => $data,
        'exam'    => $exam,
        'subject' => $subject
    ]);
})->name('student.exam.detail');


Route::post('/user/send/report', function (Request $request)
{
    $name   = $request->get('name');
    $email  = $request->get('email');
    $title  = $request->get('title');
    $detail = $request->get('detail');

    DB::table('reports')->insert([
        'name'       => $name,
        'email'      => $email,
        'title'      => $title,
        'detail'     => $detail,
        'status'     => 0,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('student.welcome');


})->name('user.send.report');

Route::post('/exam/check', function (Request $request)
{
    $data          = DB::table('exams')->where('id', '=', $request->get('id'))->first();
    $subject       = DB::table('subjects')->where('status', 0)->get();
    $exam          = json_decode($data->details, true);
    $numberCorrect = 0;
    foreach ($exam['data'] as $key => $question)
    {
        if ($question['c'] == $request['q' . ($key+1)])
        {
            $numberCorrect++;
        }
    }
    $last = ('Đúng ' . $numberCorrect . '/' . $exam['count'] . ' câu.  Điểm số: ' . $numberCorrect / $exam['count'] * 10 . " điểm");
    DB::table('points')->insert([
        'user_id'    => auth()->user()->id,
        'exam_id'    => $data->id,
        'point'      => $numberCorrect / $exam['count'] * 10,
        'detail'     => $last,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    $pointList   = DB::table('points')->where('exam_id', $data->id)->orderBy('point', 'desc')->get();
    $topStudents = collect($pointList)
        ->groupBy('user_id')
        ->map(function ($items)
        {
            return $items->sortByDesc('point')->first();
        })
        ->sortByDesc('point')
        ->take(5);
    foreach ($topStudents as $student)
    {
        $student->user = DB::table('users')->where('id', $student->user_id)->first();
    }
    return view('student.exam.info', [
        'exam'        => $exam,
        'info'        => $last,
        'subject'     => $subject,
        'topStudents' => $topStudents,
        'data' => $data
    ]);
})->name('student.exam.check');


Route::group(['prefix' => 'admin'], function ()
{
    Route::get('/', function ()
    {
        if (auth()->user()->role == 0)
        {
            return redirect()->route('student.welcome');
        }
        $userCount = DB::table('users')->where('role', '!=',1)->count();
        $subject   = DB::table('subjects')->count();
        $test      = DB::table('exams')->count();
        $video     = DB::table('videos')->count();
        $point     = DB::table('points')->orderBy('id', 'desc')->take(4)->get();
        foreach ($point as $p)
        {
            $p->user = DB::table('users')->where('id', $p->user_id)->first();
            $exam =  DB::table('exams')->where('id', $p->exam_id)->first() ?? null;
            if($exam != null){
                $p->exam = json_decode(DB::table('exams')->where('id', $p->exam_id)->first()->details, true) ?? null;
            }else{
                $p->exam = null;
            }
        }
        return view('manager.index', [
            'title'     => 'Trang chủ',
            'userCount' => $userCount,
            'subject'   => $subject,
            'test'      => $test,
            'video'     => $video,
            'point'     => $point,
        ]);
    })->name('admin.home');

    Route::get('/profile',function (){
        $user = auth()->user();
        return view('manager.profile.index',[
            'title' => 'Thông tin cá nhân',
            'user' => $user
        ]);
    })->name('admin.profile');



    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('admin.user');
    Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('admin.user.create');
    Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('admin.user.store');
    Route::get('/user/updateStatus', [App\Http\Controllers\UserController::class, 'updateStatus'])->name('admin.user.updateStatus');
    Route::get('/user/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('admin.user.update');
    Route::get('/user/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('admin.user.delete');

    Route::get('/statistic', [App\Http\Controllers\StatisticController::class, 'index'])->name('admin.statistic');
    Route::get('/statistic/detail', [App\Http\Controllers\StatisticController::class, 'detail'])->name('admin.statistic.detail');

    Route::get('/report', [App\Http\Controllers\ReportController::class, 'index'])->name('admin.report');
    Route::get('/report/create', [App\Http\Controllers\ReportController::class, 'create'])->name('admin.report.create');
    Route::post('/report/store', [App\Http\Controllers\ReportController::class, 'store'])->name('admin.report.store');
    Route::get('/report/updateStatus', [App\Http\Controllers\ReportController::class, 'updateStatus'])->name('admin.report.updateStatus');
    Route::get('/report/edit', [App\Http\Controllers\ReportController::class, 'edit'])->name('admin.report.edit');
    Route::post('/report/update', [App\Http\Controllers\ReportController::class, 'update'])->name('admin.report.update');
    Route::get('/report/delete', [App\Http\Controllers\ReportController::class, 'delete'])->name('admin.report.delete');
    Route::post('/report/send', [App\Http\Controllers\ReportController::class, 'send'])->name('admin.report.send');


    Route::get('/command', [App\Http\Controllers\CommendController::class, 'index'])->name('admin.user.command');
    Route::get('/command/create', [App\Http\Controllers\CommendController::class, 'create'])->name('admin.command.create');
    Route::post('/command/store', [App\Http\Controllers\CommendController::class, 'store'])->name('admin.command.store');
    Route::get('/command/updateStatus', [App\Http\Controllers\CommendController::class, 'updateStatus'])->name('admin.command.updateStatus');
    Route::get('/command/edit', [App\Http\Controllers\CommendController::class, 'edit'])->name('admin.command.edit');
    //    Route::post('/command/update',[App\Http\Controllers\CommendController::class, 'update'])->name('admin.command.update');
    Route::get('/command/delete', [App\Http\Controllers\CommendController::class, 'delete'])->name('admin.command.delete');


    //    Route::get('/user/report', function () {
    //        return view('manager.user.report',[
    //            'title' => 'Quản lý phản hồi'
    //        ]);
    //    })->name('admin.user.report');


    Route::get('/subject', [App\Http\Controllers\SubjectController::class, 'index'])->name('admin.subject');
    Route::get('/subject/create', [App\Http\Controllers\SubjectController::class, 'create'])->name('admin.subject.create');
    Route::post('/subject/store', [App\Http\Controllers\SubjectController::class, 'store'])->name('admin.subject.store');
    Route::get('/subject/updateStatus', [App\Http\Controllers\SubjectController::class, 'updateStatus'])->name('admin.subject.updateStatus');
    Route::get('/subject/edit', [App\Http\Controllers\SubjectController::class, 'edit'])->name('admin.subject.edit');
    Route::post('/subject/update', [App\Http\Controllers\SubjectController::class, 'update'])->name('admin.subject.update');
    Route::get('/subject/delete', [App\Http\Controllers\SubjectController::class, 'delete'])->name('admin.subject.delete');

    Route::get('/subject/chapter', [App\Http\Controllers\ChapterController::class, 'index'])->name('admin.subject.chapter');
    Route::get('/subject/chapter/create', [App\Http\Controllers\ChapterController::class, 'create'])->name('admin.chapter.create');
    Route::post('/subject/chapter/store', [App\Http\Controllers\ChapterController::class, 'store'])->name('admin.chapter.store');
    Route::get('/subject/chapter/edit', [App\Http\Controllers\ChapterController::class, 'edit'])->name('admin.chapter.edit');
    Route::post('/subject/chapter/update', [App\Http\Controllers\ChapterController::class, 'update'])->name('admin.chapter.update');
    Route::get('/subject/chapter/delete', [App\Http\Controllers\ChapterController::class, 'delete'])->name('admin.chapter.delete');


    Route::get('/subject/session', [App\Http\Controllers\SessionController::class, 'index'])->name('admin.subject.session');
    Route::get('/subject/session/create', [App\Http\Controllers\SessionController::class, 'create'])->name('admin.session.create');
    Route::post('/subject/session/store', [App\Http\Controllers\SessionController::class, 'store'])->name('admin.session.store');
    Route::get('/subject/session/edit', [App\Http\Controllers\SessionController::class, 'edit'])->name('admin.session.edit');
    Route::post('/subject/session/update', [App\Http\Controllers\SessionController::class, 'update'])->name('admin.session.update');
    Route::get('/subject/session/delete', [App\Http\Controllers\SessionController::class, 'delete'])->name('admin.session.delete');


    Route::get('/subject/video', [App\Http\Controllers\VideoController::class, 'index'])->name('admin.subject.video');
    Route::get('/subject/video/create', [App\Http\Controllers\VideoController::class, 'create'])->name('admin.video.create');
    Route::post('/subject/video/store', [App\Http\Controllers\VideoController::class, 'store'])->name('admin.video.store');
    Route::get('/subject/video/edit', [App\Http\Controllers\VideoController::class, 'edit'])->name('admin.video.edit');
    Route::post('/subject/video/update', [App\Http\Controllers\VideoController::class, 'update'])->name('admin.video.update');
    Route::get('/subject/video/delete', [App\Http\Controllers\VideoController::class, 'delete'])->name('admin.video.delete');


    Route::get('/exam', function (Request $request)
    {
        $data = $request->data ?? 0;
        $subjectData = DB::table('subjects')->get();

        if($data == 0){
            $exams = DB::table('exams')->paginate(12);
        }else{
            $exams = DB::table('exams')->where('id',$data)->paginate(12);
        }
        return view('manager.exam.index', [
            'title' => 'Quản lý bài kiểm tra',
            'exams' => $exams,
            'subjects' => $subjectData
        ]);
    })->name('admin.exam');

    Route::get('/exam/create', function ()
    {
        return view('manager.exam.create', [
            'title' => 'Tạo bài kiểm tra'
        ]);
    })->name('admin.exam.create');
    Route::post('/exam/store', function (Request $request)
    {
        $name    = $request->exam_name;
        $count   = $request->count;
        $arrData = [];
        for ($i = 1; $i <= $count; $i++)
        {
            $arr       = [
                'q'  => $request[$i . '_q'],
                'a1' => $request[$i . '_a1'],
                'a2' => $request[$i . '_a2'],
                'a3' => $request[$i . '_a3'],
                'a4' => $request[$i . '_a4'],
                'c'  => $request[$i . '_c'],
            ];
            $arrData[] = $arr;
        }

        $arrInsert = [
            'title' => $name,
            'count' => $count,
            'data'  => $arrData
        ];
        DB::table('exams')->insert([
            'details'    => json_encode($arrInsert),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.exam');

    })->name('admin.exam.store');

    Route::get('/exam/edit', function (Request $request)
    {
        $id   = $request->id;
        $data = DB::table('exams')->where('id', $id)->first();
        $exam = json_decode($data->details, true);

        return view('manager.exam.edit', [
            'title' => 'Sửa bài kiểm tra',
            'exam'  => $exam,
            'id'    => $id,
        ]);
    })->name('admin.exam.edit');

    Route::get('/exam/delete', function (Request $request)
    {
        $id = $request->id;
        DB::table('exams')->where('id', $id)->delete();
        return redirect()->route('admin.exam');

    })->name('admin.exam.delete');

    Route::post('/exam/update', function (Request $request)
    {
        $name    = $request->exam_name;
        $count   = $request->count;
        $arrData = [];
        for ($i = 1; $i <= $count; $i++)
        {
            $arr       = [
                'q'  => $request[$i . '_q'],
                'a1' => $request[$i . '_a1'],
                'a2' => $request[$i . '_a2'],
                'a3' => $request[$i . '_a3'],
                'a4' => $request[$i . '_a4'],
                'c'  => $request[$i . '_c'],
            ];
            $arrData[] = $arr;
        }

        $arrInsert = [
            'title' => $name,
            'count' => $count,
            'data'  => $arrData
        ];
        DB::table('exams')->where('id', $request->id)->update([
            'details'    => json_encode($arrInsert),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('admin.exam');
    })->name('admin.exam.update');

});
