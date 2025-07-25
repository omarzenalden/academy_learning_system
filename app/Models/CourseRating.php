<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseRating extends Model
{
    protected $fillable = [
        'course_id',
        'user_id',
        'rate'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
