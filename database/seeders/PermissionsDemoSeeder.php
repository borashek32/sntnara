<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'make posts']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);

        $role1 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create roles and assign existing permissions
        $role2 = Role::create(['name' => 'user']);

        // create demo users
        $user = \App\Models\User::factory()->create
        ([
            'name'     => 'Example Super-Admin User',
            'email'    => 'borashek@inbox.ru',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create
        ([
            'name' => 'Example User',
            'email' => 'test@example.com',
        ]);
        $user->assignRole($role2);
    }
}
