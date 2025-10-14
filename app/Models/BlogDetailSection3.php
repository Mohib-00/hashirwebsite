<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogDetailSection3 extends Model
{
    protected $table = 'blog_detail_section3s'; 
    protected $fillable = [
        'heading',
        'paragraph',
        'main_heading',
        'image',
        'slug'
    ];
}
