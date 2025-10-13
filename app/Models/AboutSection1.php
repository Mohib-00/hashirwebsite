<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection1 extends Model
{
    protected $table = 'about_section1s'; 
    protected $fillable = [
        'heading',
        'paragraph',
        'image',
    ];
}
