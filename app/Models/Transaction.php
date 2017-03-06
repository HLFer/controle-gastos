<?php

namespace finance\Models;

use finance\Traits\FormatDate;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use FormatDate;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'type', 'date', 'amount', 'description'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    protected $types = [
        'E' => 'Entrada',
        'S' => 'Saída'
    ];

    public function customer()
    {
        return $this->belongsTo('finance\Models\Customer');
    }

    public function getTypes()
    {
        return $this->types;
    }

    protected function setDateAttribute($value)
    {
        $this->attributes['date'] = $this->FormatDateForSave($value);
    }

    protected function setAmountAttribute($value)
    {
        $this->attributes['amount'] = floatval(str_replace(',', '.', str_replace('.', '', $value)));

        if ($this->attributes['type'] === 'S' && is_numeric($value) && $value > 0){
            $this->attributes['amount'] = -$this->attributes['amount'];
        }
    }

    protected function getDateAttribute($value)
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

    protected function getAmountAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }
}