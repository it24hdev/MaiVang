<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'parent',
    ];

    public function Children()
    {
        return $this->hasMany(Permission::class, 'parent');
    }

    public function Role()
    {
        return $this->belongsToMany(Role::class, 'permission_role_relationships', 'permission_id', 'role_id');
    }

    public function User()
    {
        return $this->belongsToMany(User::class, 'user_role_relationships', 'permission_id', 'user_id');
    }
}
