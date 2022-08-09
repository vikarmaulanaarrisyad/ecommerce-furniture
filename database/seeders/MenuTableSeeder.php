<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu_dashboard = Menu::create([
            'nama_menu' => 'Dashboard',
            'icons'     => 'fa-tachometer-alt',
            'url'       => '#',
            'sort'     => 1
        ]);

        $menu_management_user = Menu::create([
            'nama_menu' => 'Management User',
            'icons'     => 'fa-users',
            'url'       => 'admin/users',
            'sort'     => 2
        ]);
    }
}
