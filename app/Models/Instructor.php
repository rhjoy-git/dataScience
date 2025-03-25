<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'name', 'qualifications', 'experience',
        'profile_image', 'linkedin'
    ];
}
