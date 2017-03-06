<?php

namespace finance\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function getCreatedAtAttribute($value)
    {
        return $this->FormatDateTimeForView($value);
    }

    protected function getUpdatedAtAttribute($value)
    {
        return $this->FormatDateTimeForView($value);
    }
}
