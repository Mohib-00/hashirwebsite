<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section7 extends Model
{
    use HasFactory;

    protected $table = 'section7'; 
    protected $fillable = [
        'image',
        'heading',
        'paragraph',
    ];
}
