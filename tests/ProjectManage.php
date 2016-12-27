<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectManage extends TestCase
{
	use DatabaseTransactions;

	//建立專案
	public function testCreateProject()
    {
        $this->assertTrue(true);
    }

	//修改專案
	public function testEditProject()
    {
        $this->assertTrue(true);
    }

	//關閉專案
	public function testCloseProject()
    {
        $this->assertTrue(true);
    }

	//查詢專案
	public function testSearchProject()
    {
        $this->assertTrue(true);
    }

	//觀看專案成員
	public function testViewProjectMember()
    {
        $this->assertTrue(true);
    }

	//加入專案成員
	public function testAddProjectMember()
    {
        $this->assertTrue(true);
    }

	//剔除專案成員
	public function testRemoveProjectMember()
    {
        $this->assertTrue(true);
    }

	//修改專案成員權限
	public function testEditProjectMemberAuth()
    {
        $this->assertTrue(true);
    }

	//觀看專案成員權限
	public function testViewProjectMemberAuth()
    {
        $this->assertTrue(true);
    }

	//指派專案成員議題
	public function testAssignIssueToMember()
    {
        $this->assertTrue(true);
    }
}
