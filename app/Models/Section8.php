<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section8 extends Model
{
    use HasFactory;

    protected $table = 'section8'; 
    protected $fillable = [
        'main_paragraph',
        'image',
        'heading',
        'paragraph',
    ];
}
