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
	//input: 
	//output: user
	//view('Setting')
	Route::get('/setting','ProfileController@index')->name('setting');

	//使用者變更自己的資料
	//input: user_name,password,email(null代表沒有更改,email用來指向使用者)
	//
	//redirect('Setting')
	Route::put('/setting/update','ProfileController@update')->name('Change_user_info');;

	//顯示管理使用者畫面
	//input:
	//output: user, users
	//view('Access_Manage')
	Route::get('/access_manage','AccessManagerController@index');

	//接收使用者權限變更資訊
	//input: user_id,auth
	//output: 
	//redirect('Access_Manage')
	Route::put('/access_manage/{user_id}','AccessManagerController@update')->name('Change_user_auth');
  
	//刪除使用者
	//input: user id
	//output: 
	//redirect('Access_Manage')
	Route::delete('/access_manage/delete_user/{user_id}','AccessManagerController@delete')->name('Delete_user');

    //create使用者
    //input: requests
    //output:
    //redirect('Access_Manage')
    Route::post('/access_manage/create_user','AccessManagerController@create')->name('Add_user');
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
	Route::put('/project/{project_id}/close','ProjectController@closeProject')->name('Close_Project');

	//搜尋project
	//input: project_name
	//output: 特定的project
	//
	Route::post('/project','ProjectController@search')->name('Search_Project');

	//顯示Issue List頁面
	//input: project_id
	//output: project，user
	//view('IssueList')
	Route::get('/project/{project_id}','IssueController@index')->name('issue_list');

	//新增issue
	//input: project_id,title,priority,description,state預設是doing
	//output:
	//redirect('IssueList')
	Route::post('/project/{project_id}/add_issue','IssueController@createIssue')->name('Add_issue');

	//關閉issue
	//input: project_id,issue_id
	//output:
	//redirect('IssueList')
	Route::delete('/project/{project_id}/delete_issue/{issue_id}','IssueController@closeIssue')->name('Delete_issue');

	//搜尋issue
	//input: issue_name
	//output: 特定的issue
	//
	Route::post('/project/{project_id}','IssueController@search')->name('Search_issue');

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

	//新增專案成員
	//input: project_id,user_email,權限預設是general
	//output:
	//redirect('Project_Memeber')
	Route::post('/project/{project_id}/project_member/Add_member','MemberController@addProjectMember')->name('Add_member');

	//搜尋專案成員
	//input: member_name
	//output: 特定的member
	//
	Route::post('/project/{project_id}/project_member','MemberController@search')->name('Search_member');

	//顯示單一一個issue
	//input: project_id,issue_id
	//output: user,issue
	//view('Issue')
	Route::get('/project/{project_id}/issue/{issue_id}','IssueController@showIssue')->name('issue');

	//變更issue資訊
	//input: project_id,issue_id,priority,description,state,owner
	//output: 
	//redirect('Issue')
	Route::put('/project/{project_id}/issue/{issue_id}','IssueController@updateIssueInfo')->name('Change_issue_info');

});