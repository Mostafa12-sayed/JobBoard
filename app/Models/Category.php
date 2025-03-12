<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';

    protected $fillable = [
        'name',
        'description',
        'slug',
        'status'
    ];
    // public function jobs()
    // {
    //     return $this->hasMany(Job::class, 'category_id', 'id');
    // }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
