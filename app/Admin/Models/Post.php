<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'code',
      'slug',
      'type',
      'image',
      'summary',
      'description',
      'published_at',
      'user_id',
      'seo_title',
      'seo_keyword',
      'show',
    ];

    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function PostCategory()
    {
        return $this->belongsToMany(PostCategory::class, 'post_category_relationships', 'post_id', 'category_id');
    }

    public function Tag()
    {
        return $this->belongsToMany(Tag::class, 'tag_relationships', 'object_id', 'tag_id')->withPivot('type');
    }
}
