<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('signup',[App\Http\Controllers\SignupController::class, 'signup'])->name('signup');
Route::post('login',[App\Http\Controllers\SignupController::class, 'login'])->name('login');
Route::post('createpost',[App\Http\Controllers\SignupController::class,'createpost'])->name('createpost');
Route::post('updatepost',[App\Http\Controllers\SignupController::class,'updatepost'])->name('updatepost');
Route::get('deletepost/{id}',[App\Http\Controllers\SignupController::class,'deletepost'])->name('deletepost');
Route::get('getposttag/{tags}',[App\Http\Controllers\SignupController::class,'getposttag'])->name('getposttag');
Route::get('getallpost/{login_id}',[App\Http\Controllers\SignupController::class,'getallpost'])->name('getallpost');