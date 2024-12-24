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
        // select('*')
        // ->where('omly_panel_name', 'SELL')
        // ->where('omly_id', $id)
        // ->where('omly_option','like',$searchItem)
        // whereNotNULL('omly_panel_name')
        // ->orWhere('omly_panel_name', '!=','')
        whereIn('omly_id',[1,2,3,4,5,6])
        ->orderBy('omly_id','desc')
        // ->skip(2)
        // ->take(1)
        ->get()
        ->map(function ($items) {
            foreach($items->toArray() as $key => $value){
                if (is_null($value) || $value == '') {
                    $items->$key = 'A';
                }
            }
            return $items;
        });

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
        // select('*')
        // ->where('omly_panel_name', 'SELL')
        // ->where('omly_id', $id)
        // ->where('omly_option','like',$searchItem)
        // whereNotNULL('omly_panel_name')
        // ->orWhere('omly_panel_name', '!=','')
        ->whereIn('omly_id',[1,2,3,4,5,6])
        ->orderBy('omly_id','desc')
        // ->skip(2)
        // ->take(1)
        // ->pluck('omly_value');
        ->get()
        ->map(function ($items) {
            foreach ((array) $items as $key => $value) { 
                if (is_null($value) || $value === '') {
                    $items->$key = 'A'; 
                }
            }
            return $items; 
        });

        return response()->json([
            'success' => true,
            'data' => $data
        ]);

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
