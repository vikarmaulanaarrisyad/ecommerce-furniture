<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';

    public function submenu()
    {
        return $this->belongsToMany(Submenu::class)->withTimestamps();
    }
}
