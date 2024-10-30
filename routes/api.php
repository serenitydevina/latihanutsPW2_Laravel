<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/buku',[BukuController::class,'index']);
Route::post('/buku',[BukuController::class,'store']);
Route::patch('/buku/{buku}',[BukuController::class,'update']);
Route::delete('/buku/{buku}',[BukuController::class,'destroy']);
Route::post('register',[RegisterController::class,'register']);
Route::post('login',[RegisterController::class,'login']);
