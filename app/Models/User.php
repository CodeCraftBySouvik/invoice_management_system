<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'email', 'mobile_number', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

   

