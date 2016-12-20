<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AccountTest extends TestCase
{
	//use DatabaseMigrations;
	use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */

    //建立帳戶
    public function testSignUp()
    {
    	$this->visit('/')
             //註冊頁面
    		 ->click('Register')
    		 ->type('test01', 'name')
    		 ->type('test01@gmail.com', 'email')
    		 ->type('test01password', 'password')
    		 ->type('test01password', 'password_confirmation')
    		 ->press('Register')
    		 ->see('You are logged in!')
    		 ->seeInDatabase('users', [
    		 	'email' => 'test01@gmail.com']);
    }

    //使用者登入
    public function testLogIn()
    {
        $this->visit('/')
             //登入頁面
             ->click('Login')
             ->seePageIs('/login')
             ->type('test@gmail.com', 'email')
             ->type('testaccount', 'password')
             ->press('Login')
             ->see('You are logged in!');
    }

    //帳戶管理
    public function testEditPersonalData()
    {
        $this->visit('/')
             //登入頁面
             ->click('Login')
             ->seePageIs('/login')
             ->type('test@gmail.com', 'email')
             ->type('testaccount', 'password')
             ->press('Login')
             ->see('You are logged in!') //登入後的頁面待改

             //個人資料設定頁面
             ->press('Setting')
             ->seePageIs('/Setting')
             ->see('test')
             ->see('test@gmail.com')
             ->see('testaccount')
             ->seeInDatabase('user', [
                'name' => 'test',
                'email' => 'test@gmail.com'])
             ->type('testEdited', 'name')
             ->type('tessaccountedited', 'password')
             ->press('Save')

             //確認資料庫資料正確(沒辦法驗證密碼)
             ->seeInDatabase('user', [
                'name' => 'testEdited',
                'email' => 'test@gmail.com'])

             //登出再登入驗證密碼
             ->press('Logout')
             ->press('Login')
             ->seePageIs('/login')
             ->type('testEdited', 'name')
             ->type('tessaccountedited', 'password')
             ->press('Login')
             ->see('You are logged in!');  //登入後的頁面待改
    }

    //帳戶權限
    public function testAccountPermissions()
    {
        $this->visit('/')
             //註冊帳號
             ->click('Register')
             ->type('test01', 'name')
             ->type('test01@gmail.com', 'email')
             ->type('test01password', 'password')
             ->type('test01password', 'password_confirmation')
             ->press('Register')
             ->see('You are logged in!')

             //搜尋資料庫確認資料
             ->seeInDatabase('users', [
                'name' => 'test01', 
                'email' => 'test01@gmail.com',
                'role' => 'user']);
    }

    //安全機制


}
