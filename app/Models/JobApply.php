<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApply extends Model
{
    protected $fillable = ['cv', 'name', 'email', 'phone', 'message','job_title','status'];

}
