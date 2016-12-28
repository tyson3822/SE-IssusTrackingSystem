<?php

use App\User;
use Illuminate\Database\Seeder;
use DCN\RBAC\Models\Role;
use DCN\RBAC\Models\Permission;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        * roles
        */

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

        /*
        * permissions
        */

        $createUsersPermission = Permission::create([
            'name' => 'Create users',
            'slug' => 'create.users',
            'description' => '', // optional
        ]);

        $deleteUsersPermission = Permission::create([
            'name' => 'Delete users',
            'slug' => 'delete.users',
        ]);

        /*
        * attch role permission
        */
        $adminRole->attachPermission($createUsersPermission);
        $adminRole->attachPermission($deleteUsersPermission);

        /*
        * attach user
        */
        User::find(1)->attachRole($adminRole);
        
        for ($i=2; $i <= 5 ; $i++) { 
            User::find($i)->attachRole($userRole);
        }



    }
}
