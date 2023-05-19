<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::any('/registration',[App\Http\Controllers\RegistrationController::class,'index'])->name('registration');
Route::get('/getstate',[App\Http\Controllers\RegistrationController::class,'getstate'])->name('getstate');
Route::get('/getcity',[App\Http\Controllers\RegistrationController::class,'getcity'])->name('getcity');
Route::any('/login',[App\Http\Controllers\RegistrationController::class,'login'])->name('login');
Route::get('/users',[App\Http\Controllers\RegistrationController::class,'users'])->name('users');
Route::get('/users_list',[App\Http\Controllers\RegistrationController::class,'users_list'])->name('users_list');
Route::get('/dashboard',function() {
    return view('dashboard');
});


