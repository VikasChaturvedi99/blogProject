<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;


    protected $fillable = [
        'title', 'description', 'slug', 'excerpt', 'featured_image', 'status', 'published_at', 'author_id', 'category_id', 'meta_title', 'meta_description', 'meta_keywords'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
