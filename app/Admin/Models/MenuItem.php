<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'parent',
        'redirect',
        'depth',
        'position',
        'menu_id',
        'html_code',
    ];

    public function Children()
    {
        return $this->hasMany(MenuItem::class, 'parent');
    }
}
