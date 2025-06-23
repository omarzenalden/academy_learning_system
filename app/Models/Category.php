<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
=======

class Category extends Model
{
>>>>>>> ca7ced0 (first version: database, models and spatie role)
    protected $fillable = [
        'category_name'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
<<<<<<< HEAD
    public function interested_users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
=======
    public function interests()
    {
        return $this->hasMany(Interest::class);
>>>>>>> ca7ced0 (first version: database, models and spatie role)
    }
}
