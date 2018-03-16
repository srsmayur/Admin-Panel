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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Profile
Route::any('user/profile', ['as' => 'user.profile', 'uses' => 'UserController@profile']);
Route::any('user/{id}', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
Route::any('user/edit/{id}', 'UserController@update');

