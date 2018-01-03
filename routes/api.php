<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();	
});

Route::group(['namespace'=>'Backend','middleware'=>'auth:api'],function(){
	Route::post('/create/post','PostController@createPost');

	Route::post('/upload/image','PostController@uploadImage');
});
Route::group(['namespace'=>'FrontEnd'],function(){

	Route::get('/products','HomeController@index');	
});
