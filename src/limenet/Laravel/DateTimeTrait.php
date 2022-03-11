<?php

declare(strict_types=1);

namespace limenet\Laravel;

use Carbon\Carbon;

trait DateTimeTrait
{
    protected $traitDateFormat = 'Y-m-d';
    protected $traitTimeFormat = 'H:i';
    protected $traitDateTimeFormat = 'Y-m-d H:i:s';

    private $traitNullRequested = [];

    private function initializeDate($field): void
    {
        if (!$this->{$field}) {
            $this->{$field} = new Carbon();
        }
        if (!\array_key_exists($field, $this->traitNullRequested)) {
            $this->traitNullRequested[$field] = ['date' => false, 'time' => false];
        }
    }

    private function dtGetDate($field)
    {
        return $this->{$field} ? $this->{$field}->format($this->traitDateFormat) : null;
    }

    private function dtSetDate($field, $value): void
    {
        $this->initializeDate($field);
        $new = $this->{$field}->setDate(1, 0, 0);

        if ($value) {
            $datetime = Carbon::createFromFormat($this->traitDateFormat, $value);
            $new = $this->{$field}->setDate($datetime->year, $datetime->month, $datetime->day);
        } else {
            $this->traitNullRequested[$field]['date'] = true;
        }

        $this->attributes[$field] = $new->format($this->traitDateTimeFormat);
        $this->dtCheckFieldNullRequested($field);
    }

    private function dtGetTime($field)
    {
        return $this->{$field} ? $this->{$field}->format($this->traitTimeFormat) : null;
    }

    private function dtSetTime($field, $value): void
    {
        $this->initializeDate($field);
        $new = $this->{$field}->setTime(0, 0, 0);

        if ($value) {
            $datetime = Carbon::createFromFormat($this->traitTimeFormat, $value);
            $new = $this->{$field}->setTime($datetime->hour, $datetime->minute, 0);
        } else {
            $this->traitNullRequested[$field]['time'] = true;
        }

        $this->attributes[$field] = $new->format($this->traitDateTimeFormat);
        $this->dtCheckFieldNullRequested($field);
    }

    private function dtCheckFieldNullRequested($field): void
    {
        $nullRequestedOnAllFields = array_reduce($this->traitNullRequested[$field], fn ($a, $carry) => $a && $carry, true);

        if ($nullRequestedOnAllFields) {
            $this->attributes[$field] = null;
        }
    }
}
