<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection2 extends Model
{
    protected $table = 'about_section2s'; 
    protected $fillable = [
        'heading',
        'paragraph',
        'image',
    ];
}
