<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class McqAnswer extends Model
{
    protected $fillable = [
        'question_id',
        'user_id',
        'selected_option_id',
        'is_correct'
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
