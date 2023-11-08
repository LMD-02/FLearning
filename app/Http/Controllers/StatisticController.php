<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index(Request $request){
        $exam = DB::table('exams')->paginate();
        foreach ($exam as $value){
            $value->data = json_decode($value->details,true);
        }
        return view('manager.exam.statistic',[
            'title' => 'Thống kê điểm',
            'data' => $exam
        ]);
    }

    public function detail(Request $request){
        $pointList = DB::table('points')->where('exam_id',$request->id)->orderBy('point','desc')->get();
        $topStudents = collect($pointList)
            ->groupBy('user_id')
            ->map(function ($items) {
                return $items->sortByDesc('point')->first();
            })
            ->sortByDesc('point')
            ->take(10);
        foreach ($topStudents as $student){
            $student->user = DB::table('users')->where('id',$student->user_id)->first();
        }
        return view('manager.exam.statistic_detail',[
            'title' => 'Thống kê điểm TOP 10',
            'topStudents' => $topStudents
        ]);

    }
}
