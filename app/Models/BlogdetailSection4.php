<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogdetailSection4 extends Model
{
    protected $table = 'blogdetail_section4s'; 
    protected $fillable = [
        'heading',
        'paragraph',
        'image',
        'slug'
    ];
}
