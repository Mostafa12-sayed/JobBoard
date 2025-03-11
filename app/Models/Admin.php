<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $table = 'admins';
    protected $guarded = [];
    public $timestamps = false;

    protected $guard = 'admin';
    protected $fillable = [
        'name',
        'email',
        'password',
<<<<<<< HEAD
=======
        'phone',
        'image',

>>>>>>> 3a7c11c0f7c26e882b2a588b74bda85988f62f2b
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
