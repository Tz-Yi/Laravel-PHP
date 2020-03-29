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
    return view('pages.profile');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user-profile', 'ImageController@index');

Route::post('/user-profile/update', 'ImageController@update');

Route::get('/user-profile/fetch', 'ImageController@fetch');
