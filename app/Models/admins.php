<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;




class admins extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'image',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
