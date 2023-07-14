<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
// use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'Admin',
            'password' => '1234'
        ]);

        $permissions = Permission::pluck('id', 'id')->all();
        $role = Role::create(['name' => 'admin']);

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
