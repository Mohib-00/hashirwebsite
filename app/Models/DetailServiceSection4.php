<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailServiceSection4 extends Model
{
     protected $table = 'detail_service_section4s'; 
    protected $fillable = [
        'heading',
        'paragraph',
        'image',
        'slug'
    ];
}
