<?php

use App\Http\Controllers\AndroidController;
use App\Http\Controllers\apiControllers\LoginController;
use App\Http\Controllers\apiControllers\StudentController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
//Route::middleware('auth:sanctum')
//    ->get('/students',[StudentController::class,'index']);


Route::get('info-bar','FrontController@infoBar');
Route::get('title-bar','FrontController@titleBar');

//Route for login
Route::post('login','AndroidController@login');

//Route for frontend
Route::post('system-info','AndroidController@systemInfo');
Route::get('attendance','AndroidController@attendance');
Route::get('about','AndroidController@about');
Route::get('chairman-message','AndroidController@chairmanMessage');
Route::get('principal-message','AndroidController@principalMessage');
Route::get('student-profile','AndroidController@profile');
Route::post('syllabus','AndroidController@syllabus');
Route::get('class-routines','AndroidController@classRoutine');
Route::get('teachers','AndroidController@teachers');
Route::get('teacher-details','AndroidController@teacherDetails');
Route::get('notices','AndroidController@noticeList');
Route::get('notice-details','AndroidController@noticeDetails');
Route::get('news','AndroidController@newsList');
Route::get('news-details','AndroidController@newsDetails');
Route::post('student-login', [LoginController::class, 'studentLogin']);
Route::post('otp', [LoginController::class, 'otp']);
Route::post('otp-match', [LoginController::class, 'matchOtp']);
Route::post('token/create', [LoginController::class, 'token']);
Route::get('events','AndroidController@events');
Route::get('event-details','AndroidController@eventDetails');
Route::get('diary','AndroidController@diary');
Route::get('result','AndroidController@result');
Route::get('home','AndroidController@home');




