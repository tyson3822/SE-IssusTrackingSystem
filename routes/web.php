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
	Route::get('/Setting',function(){
		$user = ['name'=>'ABC','email'=>'a@b.com','password'=>'123456','access'=>'admin'];

		return view('Setting')
			->with('user',$user);
	});

	//接收使用者更新的自己的資料(user_name,password,email)(null代表沒有更改,email用來指向使用者)
	//導向Setting頁面,傳入使用者的資料(user_name,email,password,access)
	Route::put('/Setting',function (){
		$user = ['name'=>'abc','email'=>'a@b.com','password'=>'123','access'=>'admin'];

		return view('Setting')
			->with('user',$user);
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

	//接收使用者權限變更資訊
	//導向Access_Manage,傳入目前使用者的名稱,以及所有使用者的名稱和權限(陣列)(更改過的)
	Route::put('/Access_Manage',function(){});

	//刪除使用者
	//前端傳入user id
	//導向Access_Manage,傳入目前使用者的名稱,以及所有使用者的名稱和權限(陣列)(更改過的)
	Route::delete('/Delete_user/{user_id}',function(){});

	//導向Project List頁面
	Route::get('/projectlist','ProjectController@index');

	//建立project
	//從前端拿專案資訊
	//建立好後回到projectlist畫面
	Route::post('/Create_Project','ProjectController@createProject');

	//關閉project
	//關閉後回到projectlist畫面
	Route::put('/Close_Project/{project}',function(){});

	//進入點擊的project裡點,導向Issue List頁面
	Route::get('/IssueList/{project}',function(){});

	//導向專案成員頁面
	//傳入user name和這個project的所有成員資訊
	Route::get('/Project_Member',function(){});

	//剔除專案成員
	//從前端取得user_id,project_id
	//刪除完後回到Project_Member頁面
	Route::delete('/Delete_project_member/{project_id}',function(){});

	//變更專案成員的權限
	//從前端取得user_id,project_id,權限
	//更改好後回到Project_Member頁面
	Route::put('/Change_project_member_role/{project_id}',function(){});
});