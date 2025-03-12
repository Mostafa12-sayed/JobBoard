<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateUser extends Model
{
    use HasFactory;

    protected $table = 'candidates_users';

    protected $fillable = [
        'user_id',
        'resume',
        'linkedin_profile',
        'github_profile',
        'portfolio_website',
        'skills',
        'education',
        'experience',
        'languages',
        'interests',
        'cover_letter',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
