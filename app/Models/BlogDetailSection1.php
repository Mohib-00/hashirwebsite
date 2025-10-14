<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogDetailSection1 extends Model
{
    protected $table = 'blog_detail_section1s'; 
    protected $fillable = [
        'heading',
        'paragraph',
        'image',
        'slug'
    ];
}
