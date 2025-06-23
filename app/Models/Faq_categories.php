<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq_categories extends Model
{
    protected $fillable = [
        'faq_category_name'
    ];
    public function faq()
    {
        return $this->hasMany(Faq::class);
    }
}
