<?php

use App\User;
use Illuminate\Database\Seeder;
use DCN\RBAC\Models\Role;
use DCN\RBAC\Models\Permission;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::find(1);
        $adminRole = Role::where('slug','admin')->find(1);
        $admin->attachRole($adminRole);
    }
}
