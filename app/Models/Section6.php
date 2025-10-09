<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section6 extends Model
{
    use HasFactory;

    protected $table = 'section6'; 
    protected $fillable = [
        'heading',
        'paragraph',
        'points_headings',
        'point',
        'image',
    ];
}
