<?php

namespace App\Traits;

use Carbon\Carbon;
use Morilog\Jalali\jDate;
use Morilog\Jalali\jDateTime;

trait DateMutators
{
    /**
     * Get Created At as a Jalali Date
     *
     * @param $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return $this->prepareGetDateAttribute($value, 'd F Y - H:i');
    }

    /**
     * Set Published At To Gregorian Date
     *
     * @param $value
     */
    /*public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = $this->prepareSetDateAttribute($value, 'Y-m-d H:i:s', new Carbon());
    }*/

    /**
     * @param $value
     * @param $format
     * @return string
     */
    public function prepareGetDateAttribute($value, $format = 'Y-m-d H:i:s')
    {
        return $value != '' ? jDate::forge($value)->format($format) : ($value != null ? $value : '');
    }

    /**
     * @param $value
     * @param string $format
     * @param null|Carbon $default
     * @return Carbon|string
     */
    public function prepareSetDateAttribute($value, $format = 'Y-m-d H:i:s', $default = null)
    {
        return (!isset($value) || $value != '') ? jDateTime::createCarbonFromFormat($format, $value) : (($default != null) ? $default : $value);
    }
}
