<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'description',
        'seo_title',
        'seo_keyword',
        'seo_description',
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
