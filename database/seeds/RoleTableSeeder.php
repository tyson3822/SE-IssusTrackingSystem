<?php

use App\User;
use Illuminate\Database\Seeder;
use DCN\RBAC\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create([
        'name' => 'Admin',
        'slug' => 'admin',
        'description' => '', // optional
        'parent_id' => NULL, // optional, set to NULL by default
        ]);

        $userRole = Role::create([
        'name' => 'Base User',
        'slug' => 'user',
        'description' => '', // optional
        'parent_id' => NULL, // optional, set to NULL by default
        ]);

    }
}
