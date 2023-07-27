<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(([
            'name' => 'Manage Users',
            'guard_name' => 'web'
        ]));

        Permission::create(([
            'name' => 'Manage Roles',
            'guard_name' => 'web'
        ]));
        Permission::create(([
            'name' => 'Manage Permissions',
            'guard_name' => 'web'
        ]));
        Permission::create(([
            'name' => 'Manage Posts',
            'guard_name' => 'web'
        ]));

        Permission::create(([
            'name' => 'read posts',
            'guard_name' => 'web'
        ]));

        Permission::create(([
            'name' => 'add posts',
            'guard_name' => 'web'
        ]));
        Permission::create(([
            'name' => 'edit posts',
            'guard_name' => 'web'
        ]));
        Permission::create(([
            'name' => 'delete posts',
            'guard_name' => 'web'
        ]));
    }
}
