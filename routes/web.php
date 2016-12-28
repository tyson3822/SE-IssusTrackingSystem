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

	//導向Project List頁面
	Route::get('/projectlist','ProjectController@index');

	//建立project
	//input: project需要的所有資訊
	//output: 
	//redirect('ProjectList')
	Route::post('/project/create','ProjectController@createProject')->name('Create_Project');

	//關閉project
	//input: project_id
	//output: 
	//redirect('ProjectList')
	Route::put('/project/{project_id}/close','ProjectController@closeProject')->name('Close_Project');

	//顯示Issue List頁面
	//input: project_id
	//output: project，user
	//view('IssueList')
	Route::get('/project/{project_id}','IssueController@index')->name('issue_list');

	//新增issue
	//input: project_id,issue_name,priority,descript,state預設是doing
	//output:
	//redirect('IssueList')
	//Route::post('/project/{project_id}/add_issue',function(){})->name('Add_issue');

	//關閉issue
	//input: project_id,issue_id
	//output:
	//redirect('IssueList')
	//Route::delete('/project/{project_id}/delete_issue/{issue_id}',function(){})->name('Delete_issue');

	//顯示專案成員畫面
	//input: project_id
	//output: user，project
	//view('Project_Member')
	Route::get('/project/{project_id}/project_member','MemberController@index')->name('project_member');

	//剔除專案成員
	//input: user_id,project_id
	//output: 
	//redirect('Project_Memeber')
	Route::delete('/project/{project_id}/project_member/{member_id}/delete','MemberController@removeProjectMember')->name('Delete_project_member');

	//變更專案成員的權限
	//input: user_id,project_id,權限
	//output: 
	//redirect('Project_Memeber')
	Route::put('/project/{project_id}/project_member/{member_id}/change_auth','MemberController@updateProjectMember')->name('Change_project_member_auth');

	//顯示單一一個issue
	//input: project_id,issue_id
	//output: user,issue
	//view('Issue')
	Route::get('/project/{project_id}/issue/{issue_id}','TestController@index')->name('issue');

	//變更issue資訊
	//input: project_id,issue_id,priority,descript,state
	//output: 
	//redirect('Issue')
	//Route::get('/project/{project_id}/issue/{issue_id}',function(){})->name('Change_issue_info');
});