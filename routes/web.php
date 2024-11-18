<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class,'index']);

Route::get('/create',function(){
    return view('create');
});
Route::get('/edit/{user_id}', [UserController::class, 'edit']);