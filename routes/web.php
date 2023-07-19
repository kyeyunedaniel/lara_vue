<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('save_student','App\Http\Controllers\StudentController@save_student')->name('save_student.home');
Route::get('list_students','App\Http\Controllers\StudentController@list_students')->name('list_student.home');
Route::post('edit_students/id','App\Http\Controllers\StudentController@edit_students')->name('edit_student.home');