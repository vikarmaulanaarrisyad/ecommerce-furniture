<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = User::create([
            'name' => 'Administrator',
            // 'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$LTbT3XmpmUwjmt7bWhNhYO/LGxiObXcsIVSuHJsONup6eDnt4kSFG', //admin
            'remember_token' => rand(50, 1000),
            'email_verified_at' => now(),
        ]);

        $user = User::create([
            'name' => 'user',
            // 'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => '$2y$10$EOf5E5ekHXWGCNtpziu26.AUyvo/71iuwWGd2utYwAdxsOYUtzu5y', //user
            'remember_token' => rand(50, 10000000),
            'email_verified_at' => now(),
        ]);

        // Membuat Role
        $role_admin = Role::create(['name' => 'admin']);
        $role_user = Role::create(['name' => 'user']);
        $role_member = Role::create(['name' => 'member']);

        // Membuat Permission
        $permission_create = Permission::create(['name' => 'create user']);
        $permission_read = Permission::create(['name' => 'read user']);
        $permission_update = Permission::create(['name' => 'update user']);
        $permission_delete = Permission::create(['name' => 'delete user']);

        $admin->givePermissionTo([
            $permission_create,
            $permission_read,
            $permission_update,
            $permission_delete,
        ]);

        $user->givePermissionTo([
            $permission_read
        ]);

        $admin->assignRole($role_admin);
        $user->assignRole($role_user);
    }
}
