<?php

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
    return view('student.welcome');
});

Route::get('/subject', function () {
    return view('student.subject.index');
});
Route::get('/session', function () {
    return view('student.session.index');
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('manager.index',[
            'title' => 'Trang chủ'
        ]);
    })->name('admin.home');

    Route::get('/user', function () {
        return view('manager.user.index',[
            'title' => 'Quản lý người dùng'
        ]);
    })->name('admin.user');

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

    Route::get('/subject', function () {
        return view('manager.subject.index',[
            'title' => 'Quản lý môn học'
        ]);
    })->name('admin.subject');

    Route::get('/subject/chapter', function () {
        return view('manager.subject.chapter',[
            'title' => 'Quản lý chương'
        ]);
    })->name('admin.subject.chapter');

    Route::get('/subject/session', function () {
        return view('manager.subject.session',[
            'title' => 'Quản lý buổi học'
        ]);
    })->name('admin.subject.session');

    Route::get('/subject/video', function () {
        return view('manager.subject.video',[
            'title' => 'Quản lý video bài giảng'
        ]);
    })->name('admin.subject.video');
});
