<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['icon', 'title', 'description', 'details', 'footer'];

    public function parts()
    {
        return $this->hasMany(CoursePart::class);
    }
}

