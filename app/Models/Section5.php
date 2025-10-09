<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section5 extends Model
{
    use HasFactory;

    protected $table = 'section5';
    protected $fillable = [
        'image',
        'heading',
        'paragraph',
    ];
}
