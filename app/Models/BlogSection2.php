<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogSection2 extends Model
{
    protected $table = 'blog_section2s'; 
    protected $fillable = [
        'heading',
        'paragraph',
        'main_heading',
        'main_paragraph',
        'image',
        'links',
    ];
}
