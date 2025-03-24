<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // If using Laravel 10's hashed passwords, you may use 'hashed'
        'password' => 'hashed',
    ];
    public function jobs()
    {
        return $this->hasMany(Job::class, 'user_id', 'id');
    }
    /**
     * Get the jobs ordered by the user.
     */
    public function jobsOrder()
    {
        return $this->hasMany(Job::class, 'user_id', 'id');
    }

    /**
     * Get the employee record associated with the user.
     */
    public function employee()
    {
        return $this->hasOne(EmployeeUser::class, 'user_id', 'id');
    }

    /**
     * Get the candidate record associated with the user.
     */
    public function candidate()
    {
        return $this->hasOne(CandidateUser::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }


    public function getImageUrlAttribute()
    {
        if (!$this->profile_picture) {
            return asset('assets/website/img/defult-user.jpg');
        }
        if (Str::startsWith($this->profile_picture, ['http', 'https'])) {
            return $this->profile_picture;
        }

        return asset('storage/' . $this->profile_picture);
    }
}
