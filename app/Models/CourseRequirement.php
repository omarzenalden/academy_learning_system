<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseRequirement extends Model
{
    protected $fillable = [
        'course_id',
        'requirements'
    ];
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
