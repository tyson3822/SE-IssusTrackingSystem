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
            'subject' => 'Presidential election',
            'description' => '2016 Presidential election at Taiwan',
            'visible' => 'public',
            'state' => 'normal',
        ]);

        Project::create([
            'subject' => 'Gay marriage',
            'description' => 'Gay marriage legalization at Taiwan',
            'visible' => 'public',
            'state' => 'normal',
        ]);

        Project::create([
            'subject' => 'death penalty',
            'description' => 'about repealing death penalty',
            'visible' => 'public',
            'state' => 'normal',
        ]);

        Project::create([
            'subject' => 'Login to Mars',
            'description' => 'about planing on landing to Mars',
            'visible' => 'public',
            'state' => 'normal',
        ]);
    }
}
