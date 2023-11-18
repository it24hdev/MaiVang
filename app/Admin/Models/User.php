<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'admin',
        'remember_token',
        'phone',
        'address',
        'gender',
        'birthday',
        'image',
        'last_login_at',
        'last_login_ip',
        'email_verified_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Role()
    {
        return $this->belongsToMany(Role::class, 'user_role_relationships', 'user_id', 'role_id');
    }

    public function Product(){
        return $this->hasMany(Product::class,'user_id','id');
    }
    public function Post(){
        return $this->hasMany(Post::class,'user_id','id');
    }

    public function Order(){
        return $this->hasMany(Order::class);
    }
}
