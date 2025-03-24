<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    protected $table = 'applications';
    use HasFactory;
    protected $fillable = [
        'job_id',
        'user_id',
        'status',
        'message',
        'resume_path',
        'name',
        'email',
        'phone',

    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
