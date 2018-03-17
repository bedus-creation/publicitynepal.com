<?php

Route::group(['namespace'=>'FrontEnd'],function(){

	Route::get('/', 'HomeController@index');
	Route::get('/news/{slug}','HomeController@one');

	Route::get('/sitemap.xml','SitemapController@index');
});

Route::post('/image',function(){
	return "this is ok";
});
Route::group(['namespace'=>'Backend'],function(){
	Route::get('/foo/{command}','CommandController@command');
});
Route::group(['namespace'=>'Backend','middleware'=>['auth','web']],function(){
	Route::get('getfiles','MediaController@getFiles');
	Route::post('media/upload','MediaController@upload');
});



Route::group(['prefix'=>'admin','namespace'=>'Backend', 'middleware' => ['auth','web']],function(){
	Route::get('/','AdminController@index');
	Route::get('post/create','ArticleController@postForm');
	Route::post('post/create','ArticleController@postSave');
	Route::get('/post/all','ArticleController@postList');


	Route::get('/category/all','CategoryController@cList');
	Route::get('/category/create','CategoryController@cForm');
	Route::post('/category/create','CategoryController@cSave');
	Route::get("/category/delete/{id}","CategoryController@delete");
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