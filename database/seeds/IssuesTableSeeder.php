<?php

use App\Issue;
use Illuminate\Database\Seeder;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->issue1();

        $this->issue2();

        $this->issue3();
    }

    /**
     * unassigned issue
     */
    public function issue1()
    {
        $issue = Issue::create([
            'title' => 'good',
            'description' => 'good....description',
            'priority' => 'low',
            'state' => 'ready',
//            'user_id' => 3,
            'project_id' => '1'
        ]);
        $issue->logs()->create([
            'title' => $issue['title'],
            'description' => $issue['description'],
            'priority' => $issue['priority'],
            'state' => $issue['state'],
            'user_id' => $issue['user_id'],
        ]);
    }

    /**
     * has assigned issue
     */
    public function issue2()
    {
        $issue = Issue::create([
            'title' => 'hello',
            'description' => 'hello....description',
            'priority' => 'low',
            'state' => 'ready',
//            'user_id' => 3,
            'project_id' => '1'
        ]);
        $issue->logs()->create([
            'title' => $issue['title'],
            'description' => $issue['description'],
            'priority' => $issue['priority'],
            'state' => $issue['state'],
            'user_id' => $issue['user_id'],
        ]);
        $issue->update([
            'priority' => 'high',
            'state' => 'doing',
            'user_id' => 3,
        ]);
        $issue->logs()->create([
            'title' => $issue['title'],
            'description' => $issue['description'],
            'priority' => $issue['priority'],
            'state' => $issue['state'],
            'user_id' => $issue['user_id'],
        ]);
        $issue->update([
            'description' => 'hello...anything description',
            'priority' => 'mid',
            'user_id' => 2,
        ]);
        $issue->logs()->create([
            'title' => $issue['title'],
            'description' => $issue['description'],
            'priority' => $issue['priority'],
            'state' => $issue['state'],
            'user_id' => $issue['user_id'],
        ]);
    }

    /**
     * unassigned issue
     */
    public function issue3()
    {
        $issue = Issue::create([
            'title' => 'goodbye',
            'description' => 'goodbye....description',
            'priority' => 'low',
            'state' => 'ready',
//            'user_id' => 3,
            'project_id' => '1'
        ]);
        $issue->logs()->create([
            'title' => $issue['title'],
            'description' => $issue['description'],
            'priority' => $issue['priority'],
            'state' => $issue['state'],
            'user_id' => $issue['user_id'],
        ]);
    }
}
