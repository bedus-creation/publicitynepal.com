<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();	
});

Route::group(['namespace'=>'Backend','middleware'=>'auth:api'],function(){
	Route::post('/create/product','ProductController@createPost');

	Route::post('/upload/image','ProductController@uploadImage');
});
Route::group(['namespace'=>'FrontEnd'],function(){

	Route::get('/products','HomeController@index');	
});
