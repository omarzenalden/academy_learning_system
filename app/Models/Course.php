<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_name',
        'description',
        'rating',
        'status',
        'is_paid',
        'start_date',
        'end_date',
        'user_id',
        'category_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function rate()
    {
        return $this->hasMany(CourseRating::class);
    }
    public function course_requirements()
    {
        return $this->hasMany(CourseRequirement::class);
    }
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
