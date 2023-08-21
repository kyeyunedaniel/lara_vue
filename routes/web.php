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
Route::middleware('throttle:200,1')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('save_student', 'App\Http\Controllers\StudentController@save_student')->name('save_student.home');
    Route::get('list_students', 'App\Http\Controllers\StudentController@list_students')->name('list_student.home');
    Route::get('current_user_name', 'App\Http\Controllers\StudentController@CurrentUser')->name('list_user_current.home');
    Route::get('edit_students/{id}', 'App\Http\Controllers\StudentController@edit_students')->name('edit_student.home');
    Route::post('save_edited/{id}', 'App\Http\Controllers\StudentController@save_edited')->name('save_edited_student.home');
    Route::post('delete_student/{id}', 'App\Http\Controllers\StudentController@delete_student')->name('delete_student.home');
    Route::post('save_user', 'App\Http\Controllers\UserController@save');
    Route::get('bet_api', 'App\Http\Controllers\UserController@BetApi');
    Route::get('user_roles/{id}', 'App\Http\Controllers\RolesController@getRole');
    Route::post('police_user_new', 'App\Http\Controllers\PoliceController@create_data')->name('create_police.home');
    Route::post('shorten_url', 'App\Http\Controllers\ShortenerController@AddLongUrl')->name('shorten_url.long');
    Route::get('{any}', 'App\Http\Controllers\HomeController@index')->where('any', '.*');

    // Route::get('current_login','App\Http\Controllers\UserController@current_user');
});
