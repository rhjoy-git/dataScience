<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseData extends Model
{
    protected $table = 'course_data';
    protected $fillable = [
        'title', 'description', 'enrollment_open',
        'enrollment_url', 'enrollment_text', 
        'organization_name', 'organization_url', 'organization_logo'
    ];
}
