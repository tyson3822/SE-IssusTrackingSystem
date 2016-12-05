<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'ITS01',
            'email' => 'sunriseITS01@gmail.com',
            'password' => bcrypt('94879487'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'ITS02',
            'email' => 'sunriseITS02@gmail.com',
            'password' => bcrypt('94879487'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'ITS03',
            'email' => 'sunriseITS03@gmail.com',
            'password' => bcrypt('94879487'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'ITS04',
            'email' => 'sunriseITS04@gmail.com',
            'password' => bcrypt('94879487'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'ITS05',
            'email' => 'sunriseITS05@gmail.com',
            'password' => bcrypt('94879487'),
            'role' => 'user',
        ]);
    }
}
