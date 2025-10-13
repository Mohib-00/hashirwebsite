<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection3 extends Model
{
    protected $table = 'about_section3s'; 
    protected $fillable = [
        'main_heading',
        'main_paragraph',
        'image',
        'heading',
        'paragraph',
    ];
}
