<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs_table';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'category_id',
        'location',
        'technologies',
        'work_type',
        'min_salary',
        'max_salary',
        'application_deadline',
        'job_type'
    ];


    protected static function boot()
    {
        parent::boot();
        static::creating(function ($job) {
            $job->slug = Str::slug($job->title);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
