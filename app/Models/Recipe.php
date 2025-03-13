<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'preparation_time',
        'cooking_time',
        'ingredients',
        'image_url'
    ];

    protected $casts = [
        'ingredients' => 'array',
    ];
}
