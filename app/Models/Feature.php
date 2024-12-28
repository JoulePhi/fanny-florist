<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'icon_bg_color',
        'icon_color',
    ];
}
