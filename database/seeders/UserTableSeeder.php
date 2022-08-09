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
        $users = [
            [
                'id'                => 1,
                'name'              => 'Admin',
                'username'          => 'admin',
                'email'             =>  'admin@gmail.com',
                'password'          =>  bcrypt('password'),
                'remember_token'    =>  null,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],

            [
                'id'                => 2,
                'name'              => 'User',
                'username'          => 'user',
                'email'             =>  'user@gmail.com',
                'password'          =>  bcrypt('password'),
                'remember_token'    =>  null,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
        ];

        User::insert($users);
    }
}
