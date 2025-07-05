<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function interested_users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
