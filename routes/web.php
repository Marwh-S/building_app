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

Route::view('issues','issues.index');

Route::post('issues/store','IssuesController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('services', 'services');

Route::get('custom/login', 'CustomAuthController@login');

Route::get('custom/login/{id}', 'CustomAuthController@Customlogin');

Route::get('issues/list', 'IssuesController@list');

Route::get('users', 'UsersController@export');

//Route::post('users/import', 'UsersController@importFromExcel');

//Route::view('users-form', 'excel-import');

Route::post('issues/import', 'IssuesController@importFromExcel');

Route::view('issues-form', 'excel-import');
