<?php

use App\Project;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'subject' => 'Trump principle',
            'description' => str_random(10).'.......description of Trump principle',
            'visible' => 'private',
            'state' => 'normal',
        ]);

        Project::create([
            'subject' => 'Obama principle',
            'description' => str_random(10).'.......description of Obama principle',
            'visible' => 'private',
            'state' => 'normal',
        ]);

        Project::create([
            'subject' => 'Waston principle',
            'description' => str_random(10).'.......description of Waston principle',
            'visible' => 'private',
            'state' => 'normal',
        ]);

        Project::create([
            'subject' => 'Steve principle',
            'description' => str_random(10).'.......description of Steve principle',
            'visible' => 'public',
            'state' => 'normal',
        ]);

        Project::create([
            'subject' => 'Joe principle',
            'description' => str_random(10).'.......description of Joe principle',
            'visible' => 'public',
            'state' => 'normal',
        ]);

        Project::create([
            'subject' => 'Bush principle',
            'description' => str_random(10).'.......description of Bush principle',
            'visible' => 'public',
            'state' => 'normal',
        ]);
    }
}
