<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetialServiceSection2 extends Model
{
     protected $table = 'detial_service_section2s'; 
    protected $fillable = [
        'heading',
        'paragraph',
        'points_headings',
        'point',
        'image',
    ];
}
