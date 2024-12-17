<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class supervisors extends Authenticatable
{
      /** @use HasFactory<\Database\Factories\UserFactory> */
      use HasFactory, Notifiable;

      /**
       * The attributes that are mass assignable.
       *
       * @var array<int, string>
       */
      protected $fillable = [
        'supervisor_name',
        'email',
        'phone_number',
        'home_address',
        'studio',
        'password',
        'role',

      ];

      protected $hidden = [
        'password',
        'remember_token',
    ];
}
