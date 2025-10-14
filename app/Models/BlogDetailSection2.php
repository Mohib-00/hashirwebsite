<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogDetailSection2 extends Model
{

    protected $table = 'blog_detail_section2s'; 
    protected $fillable = [
        'heading',
        'paragraph',
        'points_headings',
        'point',
        'image',
        'slug'
    ];
}
