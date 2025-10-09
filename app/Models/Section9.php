<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section9 extends Model
{
    use HasFactory;

    protected $table = 'section9'; 
    protected $fillable = [
        'image',
    ];
}
