<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection4 extends Model
{

    protected $table = 'about_section4s';
     protected $fillable = [
        'heading',
        'paragraph',
        'points_headings',
        'point',
        'image',
    ];
}
