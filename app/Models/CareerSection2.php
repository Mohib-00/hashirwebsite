<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerSection2 extends Model
{
     protected $table = 'career_section2s'; 
    protected $fillable = [
        'heading',
        'paragraph',
        'points_headings',
        'point',
        'image',
    ];
}
