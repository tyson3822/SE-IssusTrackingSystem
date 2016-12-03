<?php

use App\User;
use Illuminate\Database\Seeder;

class ProjectUserRelationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::find(2)->projects()->attach(1,['user_auth'=>'manager']);
        User::find(2)->projects()->attach(2,['user_auth'=>'developer']);
        User::find(2)->projects()->attach(3,['user_auth'=>'general']);

        User::find(3)->projects()->attach(2,['user_auth'=>'manager']);
        User::find(3)->projects()->attach(1,['user_auth'=>'developer']);
        User::find(3)->projects()->attach(3,['user_auth'=>'general']);

        User::find(4)->projects()->attach(3,['user_auth'=>'manager']);
        User::find(4)->projects()->attach(2,['user_auth'=>'developer']);
        User::find(4)->projects()->attach(1,['user_auth'=>'general']);
    }
}
