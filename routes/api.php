<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//
Route::POST('/store', [UserController::class, 'store']);
Route::POST('/', [UserController::class, 'index']);

Route::POST('/update', [UserController::class, 'update']);
Route::delete('/delete', [UserController::class, 'destroy']);
Route::get('/index', [UserController::class, 'getUserData']);
Route::get('/index1', [UserController::class, 'getUserData1']);
