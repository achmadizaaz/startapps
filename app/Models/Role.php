<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Administrasi\RoleUnit;

class Role extends Model
{
    use HasFactory;

    public function RoleUnit()
    {
        return  $this->hasMany(RoleUnit::class)->withDefault();
    }
}
