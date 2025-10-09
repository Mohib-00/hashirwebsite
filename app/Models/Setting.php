<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';
    protected $fillable = [
        'image',
        'number',
        'email',
        'section5_heading',
        'section6_heading',
        'section8_heading',
        'section8_paragraph',
        'section9_heading',
        'section10_heading',
        'section11_heading',
        'footer_paragraph',
        'location',
        'facebook_link',
        'instagram_link',
        'linkedin_link',
        'youtube_link',
        'twitter_link',
    ];
}
