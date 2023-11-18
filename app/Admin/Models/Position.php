<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'code',
        'object_id',
    ];

    public function Menu()
    {
        return $this->belongsTo(Menu::class, 'object_id');
    }

    public function Slider()
    {
        return $this->hasMany(Slider::class, 'position_id')->where('status',1);
    }
}
