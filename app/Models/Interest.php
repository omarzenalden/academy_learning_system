<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $fillable = [
        'user_id',
        'category_id'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
