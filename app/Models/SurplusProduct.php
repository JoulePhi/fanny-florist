<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurplusProduct extends Model
{
    protected $fillable = [
        'name',
        'description',
        'original_price',
        'discount_price',
        'quantity',
        'expires_at',
        'images',
        'is_active'
    ];

    protected $casts = [
        'images' => 'array',
        'expires_at' => 'datetime',
        'is_active' => 'boolean'
    ];
}
