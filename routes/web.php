<?php
Route::get('/', function () {
	return view('welcome');
});
Route::post('/image',function(){
	return "this is ok";
});
Route::group(['namespace'=>'Backend'],function(){

	Route::get('/foo/{command}','CommandController@command');
});

Route::group(['prefix'=>'admin','namespace'=>'Backend', 'middleware' => ['auth','web']],function(){
	Route::get('/','AdminController@index');
});

Route::group(['prefix'=>'account','middleware' => ['web']], function () {
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	Route::get('logout', 'Auth\LoginController@logout')->name('logout');
	Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('register', 'Auth\RegisterController@register');
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});