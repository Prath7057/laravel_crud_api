<?php

namespace App\Http\Controllers;

use App\Models\omlayout;
use App\Models\User;
use Illuminate\Support\Facades\DB;

abstract class Controller
{
    public function getUserData()
    {
        $id = 38;
        $searchItem = '%hall%';
        // $data = DB::table('omlayout')
        $data = omlayout::
        select('*')
        // ->where('omly_panel_name', 'SELL')
        // ->where('omly_id', $id)
        // ->where('omly_option','like',$searchItem)
        ->whereNotNULL('omly_panel_name')
        ->orWhere('omly_panel_name', '!=','')
        ->orderBy('omly_id','desc')
        ->skip(2)
        ->take(1)
        ->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
    public function getUserData1()
    {
        $id = 38;
        $searchItem = '%hall%';
        $data = DB::table('omlayout')
        // $data = omlayout::
        ->select('*')
        // ->where('omly_panel_name', 'SELL')
        // ->where('omly_id', $id)
        // ->where('omly_option','like',$searchItem)
        ->whereNotNULL('omly_panel_name')
        ->orWhere('omly_panel_name', '!=','')
        ->orderBy('omly_id','desc')
        ->skip(2)
        ->take(1)
        ->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
