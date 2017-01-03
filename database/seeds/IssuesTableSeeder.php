<?php

use App\Issue;
use App\Project;
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
        $this->project1();

        $this->project2();

        $this->project3();
    }

    /**
     * unassigned issue
     */
    public function project1()
    {
        $project = Project::find(1);

        $issue = $project->issues()->create([
            'title' => 'site',
            'description' => 'decide election site',
            'priority' => 'low',
            'state' => 'ready',
        ]);
        $this->createLog($issue);

        $issue = $project->issues()->create([
            'title' => 'date',
            'description' => 'decide election date',
            'priority' => 'mid',
            'state' => 'ready',
        ]);
        $this->createLog($issue);

        $issue = $project->issues()->create([
            'title' => 'candidate',
            'description' => 'decide election candidate',
            'priority' => 'high',
            'state' => 'ready',
        ]);
        $this->createLog($issue);
        $issue->update([
            'state' => 'doing',
            'user_id' => 3,
        ]);
        $this->createLog($issue);
    }

    public function project2()
    {
        $project = Project::find(2);

        $issue = $project->issues()->create([
            'title' => 'site',
            'description' => 'decide demonstration site',
            'priority' => 'low',
            'state' => 'ready',
        ]);
        $this->createLog($issue);

        $issue = $project->issues()->create([
            'title' => 'date',
            'description' => 'decide demonstration date',
            'priority' => 'mid',
            'state' => 'ready',
        ]);
        $this->createLog($issue);

        $issue = $project->issues()->create([
            'title' => 'meal',
            'description' => 'booking meal for attendee',
            'priority' => 'high',
            'state' => 'ready',
        ]);
        $this->createLog($issue);
        $issue->update([
            'state' => 'doing',
            'user_id' => 2,
        ]);
        $this->createLog($issue);
    }

    public function project3()
    {
        $project = Project::find(3);

        $issue = $project->issues()->create([
            'title' => 'site',
            'description' => 'decide petition site',
            'priority' => 'low',
            'state' => 'ready',
        ]);
        $this->createLog($issue);

        $issue = $project->issues()->create([
            'title' => 'date',
            'description' => 'decide demonstration date',
            'priority' => 'mid',
            'state' => 'ready',
        ]);
        $this->createLog($issue);

        $issue = $project->issues()->create([
            'title' => 'meal',
            'description' => 'booking meal for attendee',
            'priority' => 'high',
            'state' => 'ready',
        ]);
        $this->createLog($issue);
    }

    public function createLog($issue)
    {
        $issue->logs()->create([
            'title' => $issue['title'],
            'description' => $issue['description'],
            'priority' => $issue['priority'],
            'state' => $issue['state'],
            'user_id' => $issue['user_id'],
        ]);
    }
}
