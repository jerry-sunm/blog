<?php

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


use Illuminate\Support\Facades\Route;

/* 로그아웃 */
Route::get('/users/logout', 'UserStudentController@logout');
/* 로그인 */
Route::get('/users/login', 'UserStudentController@user');
/* 로그인 버튼 클릭 */
Route::post('/users/login', 'UserStudentController@login');
/* 회원가입 */
Route::get('/users/join', 'UserStudentController@join');
/* 회원가입 버튼 클릭 */
Route::post('/users/join', 'UserStudentController@userJoin');
/* 로그인 후 학생정보 페이지 */
Route::get('/users/students/{id}', 'UserStudentController@student');
/* 로그인 후 학생정보 등록 페이지 */
Route::get('/users/students/insert/{id}', 'UserStudentController@stucreate');
/* 학생정보 등록 클릭!! */
Route::post('/users/students/insert', 'UserStudentController@insertStudent');
/* userprofile */
Route::get('/users/userprofile/{id}', 'UserStudentController@profile');




