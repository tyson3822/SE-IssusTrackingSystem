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
	Route::get('/setting',function(){
		$user = ['name'=>'ABC','email'=>'a@b.com','password'=>'123456','access'=>'admin'];

		return view('Setting')
			->with('user',$user);
	})->name('setting');

	//使用者變更自己的資料
	//input: user_name,password,email(null代表沒有更改,email用來指向使用者)
	//
	//redirect('Setting')
	Route::put('/setting',function (){
		$user = ['name'=>'abc','email'=>'a@b.com','password'=>'123','access'=>'admin'];

		return view('Setting')
			->with('user',$user);
	})->name('Change_user_info');

	//顯示管理使用者畫面
	//input:
	//output: 目前使用者的名稱,以及所有使用者的名稱和權限(陣列)
	//view('Access_Manage')
	Route::get('/access_manage',function(){
		$users = array(['name'=>'abc','access'=>'admin'],['name'=>'efd','access'=>'user']);

		return view('Access_Manage')
			->with('users',$users)
			->with('user_name','abc');
	});

	//接收使用者權限變更資訊
	//input: 使用者名稱,使用者email,使用者密碼(新的)
	//output: 
	//redirect('Access_Manage')
	Route::put('/access_manage',function(){})->name('Change_user_auth');

	//刪除使用者
	//input: user id
	//output: 
	//redirect('Access_Manage')
	Route::delete('/access_manage/delete_user/{user_id}',function(){})->name('Delete_user');

	//顯示Project List頁面
	//input: 
	//output: 使用者參與的所有專案，user
	//view('ProjectList')
	Route::get('/project','ProjectController@index')->name('project_list');

	//建立project
	//input: project需要的所有資訊
	//output: 
	//redirect('ProjectList')
	Route::post('/project/create','ProjectController@createProject')->name('Create_Project');

	//關閉project
	//input: project_id
	//output: 
	//redirect('ProjectList')
	Route::put('/project/{project_id}/close',function(){})->name('Close_Project');

	//顯示Issue List頁面
	//input: project_id
	//output: project，user
	//view('IssueList')
	Route::get('/project/{project_id}',function(){
				
		return view('IssueList');
	});

	//顯示專案成員畫面
	//input: project_id
	//output: user，project
	//view('Project_Member')
	Route::get('/project/{project_id}/project_member','MemberController@index');

	//剔除專案成員
	//input: user_id,project_id
	//output: 
	//redirect('Project_Memeber')
	Route::delete('/project/{project_id}/project_member/{member_id}/delete',function(){})->name('Delete_project_member');

	//變更專案成員的權限
	//input: user_id,project_id,權限
	//output: 
	//redirect('Project_Memeber')
	Route::put('/project/{project_id}/project_member/{member_id}/change_auth',function(){})->name('Change_project_member_auth');

});