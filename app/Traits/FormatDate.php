<?php

namespace finance\Traits;

use Carbon\Carbon;

trait FormatDate
{
    public function FormatDateForSave($value)
    {

        if (!empty($value) && Carbon::createFromFormat('d/m/Y', $value) !== false) {
            return Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        }
        return null;
    }

    public function FormatDateTimeForSave($value)
    {
        if (!empty($value) && Carbon::createFromFormat('d/m/Y H:m', $value) !== false) {
            return Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d H:m:s');
        }
        return null;
    }

    public function FormatDateTimeForView($value){
        if (!is_null($value))
            return Carbon::parse($value)->format('d/m/Y - H:m:s');

        return $value;
    }

    public function FormatDateForView($value){
        if (!is_null($value))
            return Carbon::parse($value)->format('d/m/Y');

        return $value;
    }
}