<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    protected $fillable = [
        'score',
        'total',
        'feedback',
        'exam_id',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function exam()
    {
        return $this->belongsTo(Exam::class,'exam_id');
    }
}
