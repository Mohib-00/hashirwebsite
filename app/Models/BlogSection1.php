<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogSection1 extends Model
{
    protected $table = 'blog_section1s'; 
    protected $fillable = [
        'heading',
        'paragraph',
        'image',
    ];
}
