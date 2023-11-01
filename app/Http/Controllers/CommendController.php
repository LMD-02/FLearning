<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 29/10/2023
 * Time: 20:00
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommendController
{
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
