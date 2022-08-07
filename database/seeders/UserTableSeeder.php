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
        $role_admin = Role::create(['name' => 'Admin']);
        $role_user = Role::create(['name' => 'User']);
        $role_member = Role::create(['name' => 'Member']);

        // Membuat Permission User
        $user_access = Permission::create(['name' => 'user_access']);
        $user_management_access = Permission::create(['name' => 'user_management_access']);
        $user_create = Permission::create(['name' => 'user_create']);
        $user_edit = Permission::create(['name' => 'user_edit']);
        $user_show = Permission::create(['name' => 'user_show']);
        $user_delete = Permission::create(['name' => 'user_delete']);

        
        // Membuat Permission Role
        $role_access = Permission::create(['name' => 'role_access']);
        $role_create = Permission::create(['name' => 'role_create']);
        $role_edit = Permission::create(['name' => 'role_edit']);
        $role_show = Permission::create(['name' => 'role_show']);
        $role_delete = Permission::create(['name' => 'role_delete']);
        
        // Membuat Permission
        $permission_access = Permission::create(['name' => 'permission_access']);
        $permission_read = Permission::create(['name' => 'permission_create']);
        $permission_edit = Permission::create(['name' => 'permission_edit']);
        $permission_show = Permission::create(['name' => 'permission_show']);
        $permission_delete = Permission::create(['name' => 'permission_delete']);

        $admin->givePermissionTo([
            $user_management_access,
            $user_create,
            $user_edit,
            $user_show,
            $user_delete,
            $user_access
        ]);

        $user->givePermissionTo([
            $user_access,
        ]);

        $admin->assignRole($role_admin);
        $user->assignRole($role_user);
    }
}
