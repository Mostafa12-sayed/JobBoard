<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = [
        'name',
        'description',
        'slug',
    ];
    // public function jobs()
    // {
    //     return $this->hasMany(Job::class, 'category_id', 'id');
    // }
}
