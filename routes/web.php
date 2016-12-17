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


	Route::get('/','HomeController@index');

	Auth::routes();


	//導向Setting頁面,傳入使用者的資料(user_name,email,password,access)
	Route::get('/setting',function(){
		$user = ['name'=>'ABC','email'=>'a@b.com','password'=>'123456','access'=>'admin'];

		return view('Setting')
			->with('user',$user);
	});

	//接收使用者更新的自己的資料(user_name,password,email)(null代表沒有更改,email用來指向使用者)
	//導向Setting頁面,傳入使用者的資料(user_name,email,password,access)
	Route::put('/setting',function (){
		$user = ['name'=>'abc','email'=>'a@b.com','password'=>'123','access'=>'admin'];

		return view('Setting')
			->with('user',$user);
	});

	//導向Access_Manage頁面,傳入目前使用者的名稱,以及所有使用者的名稱和權限(陣列)
	//users裡面放很多個user,一個user有自己的名稱和權限
	//user_name:目前使用者的名稱
	Route::get('/access_manage',function(){
		$users = array(['name'=>'abc','access'=>'admin'],['name'=>'efd','access'=>'user']);

		return view('Access_Manage')
			->with('users',$users)
			->with('user_name','abc');
	});

	//接收使用者權限變更資訊
	//導向Access_Manage,傳入目前使用者的名稱,以及所有使用者的名稱和權限(陣列)(更改過的)
	Route::put('/access_manage',function(){});

	//刪除使用者
	//前端傳入user id
	//導向Access_Manage,傳入目前使用者的名稱,以及所有使用者的名稱和權限(陣列)(更改過的)
	Route::delete('/access_manage/delete_user/{user_id}',function(){});

	//導向Project List頁面
	Route::get('/project','ProjectController@index')->name('project_list');

	//建立project
	//從前端拿專案資訊
	//建立好後回到projectlist畫面
	Route::post('/project/create','ProjectController@createProject')->name('Create_Project');

	//關閉project
	//關閉後回到projectlist畫面
	Route::put('/project/{project_id}/close',function(){})->name('Close_Project');

	//進入點擊的project裡點,導向Issue List頁面
	Route::get('/project/{project_id}',function(){});

	//導向專案成員頁面
	//output:user name和這個project的所有成員資訊
	Route::get('/project/{project_id}/project_member',function(){
	    return view("Project_Member");
    });

	//剔除專案成員
	//從前端取得user_id,project_id
	//刪除完後回到Project_Member頁面
	Route::delete('/project/{id}/project_member/{id}/delete',function(){});

	//變更專案成員的權限
	//從前端取得user_id,project_id,user_auth
	//更改好後回到Project_Member頁面
	Route::put('/project/{id}/project_member/{id}/change_auth',function(){});
});