<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'designation',
        'organization',
        'experience',
        'education',
        'skills',
        'certifications',
        'profile_image',
        'linkedin'
    ];

    protected $casts = [
        'experience' => 'array',
        'education' => 'array',
        'skills' => 'array',
        'certifications' => 'array',
    ];
}
