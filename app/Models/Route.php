<?php

namespace finance\Models;

use finance\Traits\FormatDate;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use FormatDate;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'days', 'distance', 'altitude_gain', 'description'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    protected function setDistanceAttribute($value)
    {
        $this->attributes['distance'] = floatval(str_replace(',', '.', str_replace('.', '', $value)));
    }

    protected function setAltitudeGainAttribute($value)
    {
        $this->attributes['altitude_gain'] = floatval(str_replace(',', '.', str_replace('.', '', $value)));
    }

    protected function getDistanceAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    protected function getAltitudeGainAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    protected function getCreatedAtAttribute($value)
    {
        return $this->FormatDateTimeForView($value);
    }

    protected function getUpdatedAtAttribute($value)
    {
        return $this->FormatDateTimeForView($value);
    }

}