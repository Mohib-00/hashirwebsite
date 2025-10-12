<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicesDetailsSection1 extends Model
{
     protected $table = 'services_details_section1s'; 

    protected $fillable = [
        'image',
        'heading',
        'paragraph',
    ];
}
