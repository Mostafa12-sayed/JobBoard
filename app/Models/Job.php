<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Job extends Model {
    use HasFactory;
    protected $table = 'jobs'; 
    protected $fillable = [
        'title', 'description', 'category_id', 'location', 
        'technologies', 'work_type', 'salary_range', 'application_deadline'
    ];
}


