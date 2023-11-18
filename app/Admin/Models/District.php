<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'city_id',
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
