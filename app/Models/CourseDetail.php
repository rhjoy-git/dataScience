<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseDetail extends Model
{
    protected $table = 'courses_details';
    protected $fillable = [
        'section_title',
        'icon',
        'title',
        'description',
        'details',
        'parts',
        'footer'
    ];
    protected $casts = [
        'parts' => 'array',
    ];
}
