<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerSection1 extends Model
{
    protected $table = 'career_section1s'; 

    protected $fillable = [
        'image',
        'heading',
        'paragraph',
    ];
}
