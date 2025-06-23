<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicCertificate extends Model
{
    protected $fillable = [
<<<<<<< HEAD
        'file_path',
        'description',
        'teacher_id'
=======
        'teacher_id',
        'file_path',
        'description'
>>>>>>> ca7ced0 (first version: database, models and spatie role)
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id');
    }
}
