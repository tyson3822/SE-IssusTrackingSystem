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


	//顯示使用者設定頁面
	//input: u
	//output: user_name,email,password,access
	//view('Setting')
	Route::get('/Setting',function(){
		$user = ['name'=>'ABC','email'=>'a@b.com','password'=>'123456','access'=>'admin'];

		return view('Setting')
			->with('user',$user);
	});

	//使用者變更自己的資料
	//input: user_name,password,email(null代表沒有更改,email用來指向使用者)
	//
	//redirect('Setting')
	Route::put('/Setting',function (){
		$user = ['name'=>'abc','email'=>'a@b.com','password'=>'123','access'=>'admin'];

		return view('Setting')
			->with('user',$user);
	});

	//顯示管理使用者畫面
	//input:
	//output: 目前使用者的名稱,以及所有使用者的名稱和權限(陣列)
	//view('Access_Manage')
	Route::get('/Access_Manage',function(){
		$users = array(['name'=>'abc','access'=>'admin'],['name'=>'efd','access'=>'user']);

		return view('Access_Manage')
			->with('users',$users)
			->with('user_name','abc');
	});

	//接收使用者權限變更資訊
	//input: 使用者名稱,使用者email,使用者密碼(新的)
	//output: 
	//redirect('Access_Manage')
	Route::put('/Access_Manage',function(){});

	//刪除使用者
	//input: user id
	//output: 
	//redirect('Access_Manage')
	Route::delete('/Delete_user/{user_id}',function(){});

	//顯示Project List頁面
	//input: 
	//output: 使用者參與的所有專案，user
	//view('ProjectList')
	Route::get('/projectlist','ProjectController@index');

	//建立project
	//input: project需要的所有資訊
	//output: 
	//redirect('ProjectList')
	Route::post('/Create_Project','ProjectController@createProject');

	//關閉project
	//input: project_id
	//output: 
	//redirect('ProjectList')
	Route::put('/Close_Project/{project}',function(){});

	//顯示Issue List頁面
	//input: project_id
	//output: project，user
	//view('IssueList')
	Route::get('/IssueList/{project_id}',function(){
				
		return view('IssueList');
	});


	//顯示專案成員畫面
	//input: project_id
	//output: user，project
	//view('Project_Member')
	Route::get('/Project_Member',function(){});

	//剔除專案成員
	//input: user_id,project_id
	//output: 
	//redirect('Project_Memeber')
	Route::delete('/Delete_project_member/{project_id}',function(){});

	//變更專案成員的權限
	//input: user_id,project_id,權限
	//output: 
	//redirect('Project_Memeber')
	Route::put('/Change_project_member_role/{project_id}',function(){});
});