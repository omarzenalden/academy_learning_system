<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherRating extends Model
{
    protected $fillable = [
        'user_id',
        'rate',
        'teacher_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id');
    }
}
