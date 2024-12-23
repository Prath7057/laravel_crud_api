<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

abstract class Controller
{
    public function getUserData()
    {
        $data = DB::table('omlayout')
        ->select('omly_id','omly_option','omly_value')
        ->where('omly_panel_name', 'SELL')
        ->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
