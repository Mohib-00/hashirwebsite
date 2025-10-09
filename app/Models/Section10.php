<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section10 extends Model
{
    use HasFactory;

    protected $table = 'section10';
    protected $fillable = [
        'heading',
        'paragraph',
    ];
}
