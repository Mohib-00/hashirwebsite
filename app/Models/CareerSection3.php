<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerSection3 extends Model
{
     protected $table = 'career_section3s'; 
    protected $fillable = [
        'main_heading',
        'main_paragraph',
        'image',
        'heading',
        'paragraph',
    ];
}
