<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'parent',
        'slug',
        'description',
        'icon',
        'image',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'show',
    ];

    public function Children()
    {
        return $this->hasMany(ProductCategory::class,'parent');
    }

    public function Parent()
    {
        return $this->belongsTo(ProductCategory::class,'parent')->where('parent','<>',0);
    }

    public function Product()
    {
        return $this->belongsToMany(Product::class, 'product_category_relationships', 'category_id', 'product_id');
    }
}
