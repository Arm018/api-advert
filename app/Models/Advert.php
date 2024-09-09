<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
