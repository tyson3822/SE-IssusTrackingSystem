<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AccountTest extends TestCase
{
	//use DatabaseMigrations;
	use DatabaseTransactions;

    //建立帳戶
    public function testSignUp()
    {
    	$this->visit('/')
             // 註冊頁面
    		 ->press('Sign Up!')
             ->seePageIs('/register')
    		 ->type('test01', 'name')
    		 ->type('test01@gmail.com', 'email')
    		 ->type('test01password', 'password')
    		 ->type('test01password', 'password_confirmation')
    		 ->press('Register')
    		 ->visit('/project')
    		 ->seeInDatabase('users', [
    		 	'email' => 'test01@gmail.com']);
    }

    //使用者登入
    public function testLogInCase01()
    {
        $this->visit('/')    
             //登入頁面
             ->type('test@gmail.com', 'email')
             ->type('testaccount', 'password')
             ->press('Login')
             ->seePageIs('/project'); 
    }

    //使用者登入-密碼輸入錯誤
    public function testLogInCase02()
    {
        $this->visit('/')    
             //登入頁面
             ->type('test@gmail.com', 'email')
             ->type('testaccountWorng', 'password')
             ->press('Login')
             ->see('Wrong account or password!<br>Please try another')
             ->seePageIs('/');
    }

    //使用者登入-帳號不在資料庫內
    public function testLogInCase03()
    {
        $this->visit('/')    
             //登入頁面
             ->type('testWong@gmail.com', 'email')
             ->type('testaccount', 'password')
             ->press('Login')
             ->see('Wrong account or password!<br>Please try another')
             ->seePageIs('/');
    }

    //帳戶管理
    public function testEditPersonalData()
    {
        $this->visit('/')
             //登入頁面
             ->type('test@gmail.com', 'email')
             ->type('testaccount', 'password')
             ->press('Login')
             ->visit('/project')

             //個人資料設定頁面
             ->click('設定')
             ->seePageIs('/setting')

             //確認原始資料
             ->see('使用者名稱 : TestAccount')
             ->see('Email : test@gmail.com')
             ->see('權限 : user')
             ->seeInDatabase('users', [
                'name' => 'TestAccount',
                'email' => 'test@gmail.com'])

             //輸入修改資料
             ->type('testEdited', 'name')
             ->type('testaccountedited', 'password')
             ->type('testaccountedited', 'password_confirmation')
             ->press('儲存')
             ->see('Your account has been updated!')

             //確認資料庫資料正確(沒辦法驗證密碼)
             ->seeInDatabase('users', [
                'name' => 'testEdited',
                'email' => 'test@gmail.com'])

             //登出再登入驗證密碼
             ->click('登出')
             ->visit('/');

             //有問題
             // ->type('test@gmail.com', 'email')
             // ->type('testaccountedited', 'password')
             // ->press('Login')
             // ->visit('/project');
    }

    //帳戶權限
    public function testAccountPermissions()
    {
        $this->visit('/')
             //註冊帳號
             ->press('Sign Up!')
             ->type('test01', 'name')
             ->type('test01@gmail.com', 'email')
             ->type('test01password', 'password')
             ->type('test01password', 'password_confirmation')
             ->press('Register')
             ->seePageIs('/project')

             //搜尋資料庫確認資料
             ->seeInDatabase('users', [
                'name' => 'test01', 
                'email' => 'test01@gmail.com',
                'role' => 'user']);
    }

    //安全機制


}
