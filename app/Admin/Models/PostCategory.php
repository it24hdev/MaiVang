<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent',
        'slug',
        'description',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'show',
    ];

    public function Children()
    {
        return $this->hasMany(PostCategory::class, 'parent');
    }

    public function Parent()
    {
        return $this->belongsTo(PostCategory::class, 'parent')->where('parent', '<>', 0);
    }

    public function Post()
    {
        return $this->belongsToMany(Post::class, 'post_category_relationships', 'category_id', 'post_id');
    }
}
