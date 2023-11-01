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

class FavouriteController
{
    public  function update(Request $request){
        $id = $request->get('id');
        $user = auth()->user();
        $type = $request->get('type');
        if($type == 1){
            DB::table('favorites')->insert([
                'user_id' => $user->id,
                'session_id' => $id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }else{
            DB::table('favorites')->where('user_id', $user->id)->where('session_id', $id)->delete();
        }

        return redirect()->back();
    }
}
