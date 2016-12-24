<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IssueManage extends TestCase
{
	use DatabaseTransactions;

	//建立議題
	public function testCreateIssue()
    {
        $this->assertTrue(true);
    }

	//修改議題
	public function testEditIssue()
    {
        $this->assertTrue(true);
    }

	//關閉議題
	public function testCloseIssue()
    {
        $this->assertTrue(true);
    }

	//查詢議題
	public function testSearchIssue()
    {
        $this->assertTrue(true);
    }

	//議題歷史查詢
	public function testSearchIssueHistory()
    {
        $this->assertTrue(true);
    }

	//議題變動通知
	public function testIssueChangeNotify()
    {
        $this->assertTrue(true);
    }
}
