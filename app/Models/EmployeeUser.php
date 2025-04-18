<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeUser extends Model
{
    use HasFactory;

    protected $table = 'employees_users';

    protected $fillable = [
        'user_id',
        'company_name',
        'company_logo',
        'position',
        'phone_number',
        'address',
        'profile_picture',
        'background_image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobs()
    {
        return $this->hasMany(job::class);
    }

    public function getJobsCountAttribute()
    {
        return Job::where('user_id', $this->user_id)->where('status', 'active')->count();
    }
}
