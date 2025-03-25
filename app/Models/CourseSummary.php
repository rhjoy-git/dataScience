<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSummary extends Model
{
    protected $fillable = ['section_title', 'stats', 'schedule'];
}
