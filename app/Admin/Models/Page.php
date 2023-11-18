<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'slug',
      'summary',
      'description',
      'seo_title',
      'seo_keyword',
      'seo_description',
    ];
}
