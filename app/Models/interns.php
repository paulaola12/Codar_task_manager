<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class interns extends Authenticatable
{
      /** @use HasFactory<\Database\Factories\UserFactory> */
      use HasFactory, Notifiable;

      /**
       * The attributes that are mass assignable.
       *
       * @var array<int, string>
       */
      protected $fillable = [
        'intern_name',
            'email',
            'phone_number',
           'home_address',
           'class',
           'studio',
           'password',
      ];

      protected $hidden = [
            'password',
            'remember_token',
        ];

}
