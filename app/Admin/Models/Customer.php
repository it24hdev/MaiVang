<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'birthday',
        'gender',
        'email',
        'city_id',
        'district_id',
        'address',
        'company_name',
        'company_tax_code',
        'company_address',
        'note',
        'image',
    ];

    public function City()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function District()
    {
        return $this->belongsTo(District::class);
    }

    public function Order()
    {
        return $this->hasMany(Order::class);
    }
}
