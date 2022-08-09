<?php

namespace Database\Seeders;

use App\Models\Submenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubmenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        Submenu::create([
                'nama_submenu' => 'Permissions',
                'icons' => 'fa-unlock-alt',
                'url' => 'konfigurasi/permissions',
                'sort' => 1
            ]);

        Submenu::create([
                'nama_submenu' => 'Roles',
                'icons' => 'fa-briefcase',
                'url' => 'konfigurasi/roles',
                'sort' => 2
            ]);

        Submenu::create([
                'nama_submenu' => 'User',
                'icons' => 'fa-user',
                'url' => 'konfigurasi/users',
                'sort' => 3
            ]);
    }
}
