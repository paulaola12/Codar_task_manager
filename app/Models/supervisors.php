<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class supervisors extends Model
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
        'home_address',
        'phone_number',
        'studio',
      ];
}
