<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerSection4 extends Model
{
    protected $table = 'career_section4s'; 

    protected $fillable = [
        'image',
        'heading',
        'paragraph',
        'links',
        'main_heading'
    ];
}
