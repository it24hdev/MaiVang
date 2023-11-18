<?php

namespace App\Admin\Models;

use App\Admin\Models\MenuItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function MenuItem(){
        return $this->hasMany(MenuItem::class,'menu_id')->orderBy('position', 'asc');
    }

    public function Position(){
        return $this->hasMany(Position::class,'object_id');
    }
}
