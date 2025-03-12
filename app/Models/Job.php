<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Job extends Model {
    use HasFactory;
   protected $table = 'jobs_table';
    protected $fillable = [
        'title', 'description', 'category_id', 'location', 
        'technologies', 'work_type', 'salary_range', 'application_deadline'
    ];
}

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

