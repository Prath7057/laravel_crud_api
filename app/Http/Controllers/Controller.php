<?php

namespace App\Http\Controllers;

use App\Models\omlayout;
use App\Models\User;
use Illuminate\Support\Facades\DB;

abstract class Controller
{
    public function getUserData()
    {
        // $data = DB::table('omlayout')
        $data = omlayout::
        // select('*')

        // ->where('omly_panel_name', 'SELL')
        // ->where('omly_id', $id)
        // ->where('omly_option','like',$searchItem)
        // ->whereNotNULL('omly_panel_name')
        // ->orWhere('omly_panel_name', '!=','')
        // ->whereIn('omly_id',[1,2,3,4,5,6])
        // ->whereBetween('omly_id',[1,5])
        // ->whereNotBetween('omly_id',[10,20])

        // ->orderBy('omly_id','desc')

        // ->skip(2)
        // ->take(1)

        // ->select( 'omly_panel_name', DB::raw('count(omly_id) as count'))
        // ->groupBy('omly_panel_name')
        // ->having('count', '>',0)

        get();

        // ->value('omly_option','omly_value');

        // ->map(function ($items) {
        //     foreach($items->toArray() as $key => $value){
        //         if (is_null($value) || $value == '') {
        //             $items->$key = 'A';
        //         }
        //     }
        //     return $items;
        // });

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
    public function getUserData1()
    {
        $data = DB::table('omlayout')
        // select('*')

        // ->where('omly_panel_name', 'SELL')
        // ->where('omly_id', $id)
        // ->where('omly_option','like',$searchItem)
        // ->whereNotNULL('omly_panel_name')
        // ->orWhere('omly_panel_name', '!=','')
        // ->whereIn('omly_id',[1,2,3,4,5,6])
        // ->whereBetween('omly_id',[1,5])
        // ->whereNotBetween('omly_id',[10,20])

        // ->orderBy('omly_id','desc')

        // ->skip(2)
        // ->take(1)

        // ->pluck('omly_value');

        // ->select( 'omly_panel_name', DB::raw('count(omly_id) as count'))
        // ->groupBy('omly_panel_name')
        // ->having('count', '>',0)
        
         ->get();

        // ->value('omly_option','omly_value');

        // ->map(function ($items) {
        //     foreach ((array) $items as $key => $value) { 
        //         if (is_null($value) || $value === '') {
        //             $items->$key = 'A'; 
        //         }
        //     }
        //     return $items; 
        // });

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
