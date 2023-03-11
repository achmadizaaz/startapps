<?php

namespace App\Models\Administrasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Role;

class RoleUnit extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'role_id', 'unit_id'];

    public function user()
    {
        return  $this->belongsTo(User::class)->withDefault();
    }

    public function role()
    {
        return  $this->belongsTo(Role::class)->withDefault();
    }

    public function unit()
    {
        return  $this->belongsTo(Unit::class)->withDefault();
    }
}
