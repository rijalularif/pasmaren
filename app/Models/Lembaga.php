<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Lembaga extends Model
{
    use HasFactory, Sluggable;

    // Secara eksplisit set nama tabel (karena default pluralisasi akan jadi "lembagas")
    protected $table = 'lembagas';
    protected $guarded = ['id'];

    // Casting; decimal:8 mengembalikan string yang terformat (hindari pembulatan float)
    protected $casts = [
        'latitude'  => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_lembaga'
            ]
        ];
    }
}
