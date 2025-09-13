<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pontren extends Model
{
    /** @use HasFactory<\Database\Factories\PontrenFactory> */
    use HasFactory;
    protected $guarded = ['id'];
}
