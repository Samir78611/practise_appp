<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\dashboardController;


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

Route::post('/signupform',[SignupController::class,'Signup']);
Route::post('/userlogin',[LoginController::class,'LoginForm']);
Route::get('/dashboard',[dashboardController::class,'dashboardUser']);
Route::post('student_id',[dashboardController::class,'attendence']);
Route::get('/delete_user/{id}',[dashboardController::class,'delete']);
Route::get('edit_student/{id}',[dashboardController::class,'editUser']);

// edit_user
Route::post('/modify',[dashboardController::class,'Updatedetails']);
