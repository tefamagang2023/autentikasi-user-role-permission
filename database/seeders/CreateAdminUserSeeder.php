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
        // $user = User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'username' => 'Admin',
        //     'password' => '1234'
        // ]);

        // $permissions = Permission::pluck('id', 'id')->all();
        // $role = Role::create(['name' => 'admin']);

        // $role->syncPermissions($permissions);

        // $user->assignRole([$role->id]);

        $root = User::create([
            'name' => 'root',
            'email' => 'root@gmail.com',
            'username' => 'root',
            'password' => 'root'
        ]);
        $root->assignRole(['admin']);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'username' => 'user',
            'password' => '1234'
        ]);
        $user->assignRole(['user']);

        $dosen = User::create([
            'name' => 'Dosen',
            'email' => 'dosen@gmail.com',
            'username' => 'dosen',
            'password' => '1234'
        ]);

        $mahasiswa = User::create([
            'name' => 'Mahasiswa',
            'email' => 'Mahasiswa@gmail.com',
            'username' => 'mahasiswa',
            'password' => '1234'
        ]);
    }
}
