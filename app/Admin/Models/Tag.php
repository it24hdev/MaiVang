<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'seo_title',
        'seo_keyword',
        'seo_description',
    ];

    public function Product()
    {
        return $this->belongsToMany(Tag::class, 'tag_relationships', 'tag_id', 'object_id')->withPivot('type');
    }
}
