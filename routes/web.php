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

	Route::get('/', function () {return view('home');});

	Auth::routes();
	Route::get('/home', 'HomeController@index');

	//導向Setting頁面,傳入使用者的資料(user_name,email,password,access)
	Route::get('/Setting',function(){
		return view('Setting')
			->with('user_name','ABC')
			->with('email','a@b.com')
			->with('password','123456')
			->with('access','admin');
	});

	//接收使用者更新的自己的資料(user_name,password,email)(null代表沒有更改,email用來指向使用者)
	//導向Setting頁面,傳入使用者的資料(user_name,email,password,access)
	Route::put('/Setting/{email}/{user_name?}/{password?}',function ($user_name = null,$email,$password = null){

		return view('Setting')
			->with('user_name','abc')
			->with('email','a@b.com')
			->with('password','123')
			->with('access','admin');
	});

	//導向Access_Manage頁面,傳入目前使用者的名稱,以及所有使用者的名稱和權限(陣列)
	//users裡面放很多個user,一個user有自己的名稱和權限
	//user_name:目前使用者的名稱
	Route::get('/Access_Manage',function(){
		$users = array(['name'=>'abc','access'=>'admin'],['name'=>'efd','access'=>'user']);

		return view('Access_Manage')
			->with('users',$users)
			->with('user_name','abc');
	});

	//導向Project List頁面
	Route::get('/ProjectList',function(){
		return view('ProjectList')
			->with('user_name','abc')
			->with('projects_name',array('Project A','Project B','Project C'))
			->with('project_issue_count',array(2,4,6));
	});
});