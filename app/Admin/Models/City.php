<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'code',
    ];

    public function Customer()
    {
        return $this->hasMany(Customer::class);
    }

    public function Order()
    {
        return $this->hasMany(Order::class);
    }
}
