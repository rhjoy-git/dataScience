<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curriculum extends Model
{
    use HasFactory;
    protected $fillable = [  
        'section_title',  
        'week',  
        'title',  
        'instructor',  
        'profile_image',  
        'lessons',  
    ];  
    protected $table = 'curriculums';
    
    protected $casts = [  
        'lessons' => 'array',  
        
    ];  
}
