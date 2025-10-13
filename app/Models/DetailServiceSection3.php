<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailServiceSection3 extends Model
{
    protected $table = 'detail_service_section3s'; 
    protected $fillable = [
        'heading',
        'paragraph',
        'main_heading',
        'image',
        'slug'
    ];
}
