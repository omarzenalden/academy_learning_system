<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectSubmission extends Model
{
    protected $fillable = [
        'question_id',
        'user_id',
        'file_path',
        'submission_type',
        'grade',
        'feedback'
    ];
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
