<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
>>>>>>> ca7ced0 (first version: database, models and spatie role)
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
<<<<<<< HEAD
    use HasFactory;
=======
>>>>>>> ca7ced0 (first version: database, models and spatie role)
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

<<<<<<< HEAD
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot(['is_completed' , 'certificate_id'])
            ->withTimestamps();
=======
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
>>>>>>> ca7ced0 (first version: database, models and spatie role)
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function rate()
    {
        return $this->hasMany(CourseRating::class);
    }
<<<<<<< HEAD
    public function course_requirements()
=======
    public function requirements()
>>>>>>> ca7ced0 (first version: database, models and spatie role)
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
