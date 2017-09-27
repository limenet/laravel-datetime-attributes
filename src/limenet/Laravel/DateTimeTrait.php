<?php

namespace limenet\Laravel;

use Carbon\Carbon;

trait DateTimeTrait
{
    protected $traitDateFormat = 'Y-m-d';
    protected $traitTimeFormat = 'H:i';
    protected $traitDateTimeFormat = 'Y-m-d H:i:s';

    private function initializeDate($field)
    {
        if (!$this->{$field}) {
            $this->{$field} = new Carbon();
        }
    }

    private function dtGetDate($field)
    {
        return $this->{$field} ? $this->{$field}->format($this->traitDateFormat) : null;
    }

    private function dtSetDate($field, $value)
    {
        $this->initializeDate($field);
        $new = $this->{$field}->setDate(1, 0, 0);
        if ($value) {
            $datetime = Carbon::createFromFormat($this->traitDateFormat, $value);
            $new = $this->{$field}->setDate($datetime->year, $datetime->month, $datetime->day);
        }

        $this->attributes[$field] = $new->format($this->traitDateTimeFormat);
    }

    private function dtGetTime($field)
    {
        return $this->{$field} ? $this->{$field}->format($this->traitTimeFormat) : null;
    }

    private function dtSetTime($field, $value)
    {
        $this->initializeDate($field);
        $new = $this->{$field}->setTime(0, 0, 0);
        if ($value) {
            $datetime = Carbon::createFromFormat($this->traitTimeFormat, $value);
            $new = $this->{$field}->setTime($datetime->hour, $datetime->minute, 0);
        }

        $this->attributes[$field] = $new->format($this->traitDateTimeFormat);
    }
}
