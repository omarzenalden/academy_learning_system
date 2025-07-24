<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicCertificate extends Model
{
    protected $fillable = [
        'file_path',
        'description',
        'teacher_id'
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id');
    }
}
