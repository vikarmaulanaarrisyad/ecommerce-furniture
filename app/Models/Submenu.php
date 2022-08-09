<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Submenu extends Model
{
    use HasFactory;

    protected $table = 'submenu';

    public function menu()
    {
        return $this->belongsToMany(Menu::class)->withTimestamps();
    }

}
