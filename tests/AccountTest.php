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

    //註冊帳號
    public function testSignUp()
    {
    	$this->visit('/')
    		 ->click('Register')
    		 ->type('test01', 'name')
    		 ->type('test01@gmail.com', 'email')
    		 ->type('test01password', 'password')
    		 ->type('test01password', 'password_confirmation')
    		 ->press('Register')
    		 ->see('You are logged in!')
    		 ->seeInDatabase('users', [
    		 	'name' => 'test01', 
    		 	'email' => 'test01@gmail.com']);

    }

    //帳號登入
    public function testLogIn()
    {
        $this->visit('/')
             ->click('Login')
             ->seePageIs('/login')
             ->type('test@gmail.com', 'email')
             ->type('testaccount', 'password')
             ->press('Login')
             ->see('You are logged in!');
    }
}
