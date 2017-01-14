<?php

namespace finance\Models;

use Carbon\Carbon;
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

    public function getCreatedAtAttribute($value)
    {
        return $this->getFormatDate($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return $this->getFormatDate($value);
    }

    protected function getFormatDate($value)
    {
        if (!is_null($value))
            return Carbon::parse($value)->format('d/m/Y - H:m');

        return $value;
    }
}
