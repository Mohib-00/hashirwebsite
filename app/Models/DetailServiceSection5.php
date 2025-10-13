<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailServiceSection5 extends Model
{
    protected $table = 'detail_service_section5s'; 
    protected $fillable = [
        'heading',
        'paragraph',
        'slug',
        'main_heading'
    ];
}
