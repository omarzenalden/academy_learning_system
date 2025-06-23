<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon_path',
<<<<<<< HEAD
=======
        'user_id'
>>>>>>> ca7ced0 (first version: database, models and spatie role)
    ];

    public function user()
    {
<<<<<<< HEAD
        return $this->belongsToMany(User::class,'user_id')->withTimestamps()->withPivot('is_done','progress_percentage');
=======
        return $this->belongsTo(User::class,'user_id');
>>>>>>> ca7ced0 (first version: database, models and spatie role)
    }
}
