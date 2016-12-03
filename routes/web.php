<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::group(['middleware' => ['web']], function () {

	Route::get('/', function () {return view('welcome');});

	Auth::routes();
	Route::get('/home', 'HomeController@index');

	Route::get('/Setting',function(){return view('Setting')->with('user_name','ABC')->with('email','a@b.com')->with('password','123456')->with('access','admin');});

	Route::get('/Access_Manage',function(){return view('Access_Manage');});
});