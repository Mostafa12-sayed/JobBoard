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
<<<<<<< HEAD
=======
        'status'
>>>>>>> 3a7c11c0f7c26e882b2a588b74bda85988f62f2b
    ];
    // public function jobs()
    // {
    //     return $this->hasMany(Job::class, 'category_id', 'id');
    // }
<<<<<<< HEAD
=======

    public function jobs()
    {
        return $this->hasMany(Jobs::class);
    }
>>>>>>> 3a7c11c0f7c26e882b2a588b74bda85988f62f2b
}
