<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'code',
        'customer_id',
        'total',
        'discount_order',
        'status',
        'status_payment',
        'user_id',
        'note',
        'city_id',
        'district_id',
        'address',

    ];

    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function City()
    {
        return $this->belongsTo(City::class,'city_id');
    }

    public function District()
    {
        return $this->belongsTo(District::class,'district_id');
    }

    public function Product()
    {
        return $this->belongsToMany(Product::class, 'order_details', 'order_id', 'product_id')->withPivot('price','quantity','discount');
    }
}
