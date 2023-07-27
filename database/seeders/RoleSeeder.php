<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();
        $root = Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        //mengambil data permission untuk root
        $manage_users = $permissions->where('name', 'Manage Users')->first();
        $manage_roles = $permissions->where('name', 'Manage Roles')->first();
        $manage_permissions = $permissions->where('name', 'Manage Permissions')->first();
        $manage_posts = $permissions->where('name', 'Manage Posts')->first();
        $add_posts = $permissions->where('name', 'add posts')->first();
        $read_posts = $permissions->where('name', 'read posts')->first();
        $edit_posts = $permissions->where('name', 'edit posts')->first();
        $delete_posts = $permissions->where('name', 'delete posts')->first();
        $root->givePermissionTo([
            $manage_users, $manage_roles, $add_posts, $read_posts,
            $edit_posts,  $delete_posts, $manage_permissions, $manage_posts
        ]);

        $user = Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);

        $manage_posts = $permissions->where('name', 'Manage Posts')->first();
        $add_posts = $permissions->where('name', 'add posts')->first();
        $read_posts = $permissions->where('name', 'read posts')->first();
        $edit_posts = $permissions->where('name', 'edit posts')->first();
        $delete_posts = $permissions->where('name', 'delete posts')->first();
        $user->givePermissionTo([
            $add_posts, $read_posts, $manage_posts,
            $edit_posts,  $delete_posts
        ]);
    }
}
