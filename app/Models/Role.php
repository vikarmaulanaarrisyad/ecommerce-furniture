<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'roles';

    public function permission()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }
}
