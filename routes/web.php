<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::post('/upload','userController@uploadPix')->name('uploadPhoto');

Route::get('/change_password', 'userController@changePassword')->name('changePass');

Route::post('/change_password', 'userController@changePass')->name('changePass');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
