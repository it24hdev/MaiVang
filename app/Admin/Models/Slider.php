<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'order_number',
        'image_mobile',
        'image_web',
        'position_id',
        'status'
    ];

    const noImage = "no-image.jpg";
}
