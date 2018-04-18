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


Route::group(array('before' => 'auth'), function () {


	Route::get('/dashboard','HomeController@index')->name('home');;

	//Profile
	Route::any('user/profile', ['as' => 'user.profile', 'uses' => 'UserController@profile']);
	Route::any('user/{id}', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
	Route::any('user/edit/{id}', 'UserController@update');
	Route::any('charts', 'ChartController@index');
	Route::any('charts/readdata', 'ChartController@readdata');
	Route::any('charts/comment_box', 'ChartController@comment_box');
});


Route::group(array('before' => 'guest'), function () {

	Route::any('/home','LoginController@index');

	Route::any('/login','LoginController@login');
	Route::any('/logout','LoginController@dologout');

	//Reset Password
	Route::any('/password/reset','ResetpasswordController@getemail');
	Route::any('/password/email','ResetpasswordController@seneResetLinkEmail');
	Route::any('password/reset/{password_token}', 'ResetpasswordController@showResetForm');
	Route::any('password/resetpassword', 'ResetpasswordController@reset_pasd');

	Route::any('/password/reset_pasd','ResetpasswordController@reset_pasd');
	Route::any('/register','RegisterController@register');
	Route::any('/registration','RegisterController@doRegistration');

	Route::any('/email_verify/{verificationcode}','RegisterController@confirm');


	/*
    // Authentication Routes...
        $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
        $this->post('login', 'Auth\LoginController@login');
        $this->post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
        $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        $this->post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
        $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
        $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
        $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
        $this->post('password/reset', 'Auth\ResetPasswordController@reset');


        */
});