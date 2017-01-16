<?php
/**
 * Created by PhpStorm.
 * User: george
 * Date: 13/01/17
 * Time: 14:51
 */

namespace finance\Models;


use finance\Traits\FormatDate;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use FormatDate;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'document', 'birth_date'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'birth_date'
    ];

    public function transactions()
    {
        return $this->hasMany('Transaction');
    }

    protected function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = $this->FormatDateForSave($value);
    }

    protected function getBirthDateAttribute($value)
    {
        return $this->FormatDateForView($value);
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