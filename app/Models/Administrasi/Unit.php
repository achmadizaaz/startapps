<?php

namespace App\Models\Administrasi;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'kode_unit',
        'nama_unit',
        'slug',
    ];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['kode_unit','nama_unit']
            ]
        ];
    }

    public function RoleUnit()
    {
        return  $this->hasMany(RoleUnit::class)->withDefault();
    }
}
