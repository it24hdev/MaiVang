<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAlbum extends Model
{
    use HasFactory;
    protected $fillable = [
      'product_id',
      'image'
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
