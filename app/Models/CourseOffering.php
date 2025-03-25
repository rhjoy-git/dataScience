<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseOffering extends Model
{
    protected $fillable = [
        'section_title',
        'icon',
        'title', 
        'description'
    ];
}
