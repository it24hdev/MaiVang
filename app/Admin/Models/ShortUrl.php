<?php

namespace App\Admin\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'url_key',
        'default_short_url',
        'redirect_url',
        'activated_at',
        'deactivated_at',
    ];

    const type = [
        1 => 'Sản phẩm',
        2 => 'Bài viết',
        3 => 'Danh mục sản phẩm',
        4 => 'Danh mục bài viết',
        5 => 'Trang cố định',
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class, 'url_key', 'slug');
    }

    public function Post()
    {
        return $this->belongsTo(Post::class, 'url_key', 'slug');
    }

    public function CategoryPost()
    {
        return $this->belongsTo(PostCategory::class, 'url_key', 'slug');
    }

    public function CategoryProduct()
    {
        return $this->belongsTo(ProductCategory::class, 'url_key', 'slug');
    }

    public function Page()
    {
        return $this->belongsTo(Page::class, 'url_key', 'slug');
    }
}
