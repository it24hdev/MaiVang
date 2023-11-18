<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'describe',
    ];
    public function Permission(){

        return $this->belongsToMany(Permission::class, 'permission_role_relationships', 'role_id', 'permission_id');
    }

    public function User()
    {
        return $this->belongsToMany(User::class, 'user_role_relationships', 'role_id', 'user_id');
    }
}
