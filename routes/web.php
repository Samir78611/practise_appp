<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// signup form
Route::get('/signup', function () {
    return view('/signup');
});
Route::get('/login', function () {
    return view('/login');
});

Route::get('/dashboard', function () {
    return view('/dashboard');
});
Route::post('/signupform',[SignupController::class,'Signup']);
Route::post('/userlogin',[LoginController::class,'LoginForm']);
Route::get('/retreive',)
