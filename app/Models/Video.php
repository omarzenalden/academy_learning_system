<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'course_id',
        'description',
        'duration',
        'url',
        'title',
        'poster'
    ];
    public function exam()
    {
        return $this->hasOne(Exam::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
    public function watchLater()
    {
        return $this->hasMany(WatchLater::class);
    }
}
