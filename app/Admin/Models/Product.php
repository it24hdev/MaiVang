<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'slug',
        'cost',
        'price',
        'price_market',
        'price_range',
        'image',
        'user_id',
        'show',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function ProductCategory()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_category_relationships', 'product_id', 'category_id');
    }

    public function Tag()
    {
        return $this->belongsToMany(Tag::class, 'tag_relationships', 'object_id', 'tag_id')->withPivot('type');
    }

    public function Order()
    {
        return $this->belongsToMany(Order::class, 'order_details', 'product_id', 'order_id')->withPivot('price','quantity');
    }

    public function ProductAlbum()
    {
        return $this->hasMany(ProductAlbum::class);
    }

    public function ProductDetail()
    {
        return $this->hasOne(ProductDetail::class);
    }
}


