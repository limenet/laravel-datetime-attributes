<?php

declare(strict_types=1);

namespace Limenet\LaravelDatetimeAttributes;

use Carbon\Carbon;

trait DateTimeTrait
{
    protected $traitDateFormat = 'Y-m-d';

    protected $traitTimeFormat = 'H:i';

    protected $traitDateTimeFormat = 'Y-m-d H:i:s';

    /** array<model-property, array<{date: bool, time: bool}>> */
    private $traitNullRequested = [];

    /**
     * @param  model-property<self>  $field
     */
    private function initializeDate($field): void
    {
        $this->{$field} ??= new Carbon;

        $this->traitNullRequested[$field] ??= ['date' => false, 'time' => false];
    }

    /**
     * @param  model-property<self>  $field
     */
    private function dtGetDate($field): ?string
    {
        $value = $this->{$field};

        if (! $value instanceof Carbon) {
            return null;
        }

        return $value->format($this->traitDateFormat);
    }

    /**
     * @param  model-property<self>  $field
     */
    private function dtSetDate($field, ?string $value): void
    {
        $this->initializeDate($field);
        $new = $this->{$field}->setDate(1, 0, 0);

        if ($value !== null) {
            $datetime = Carbon::createFromFormat($this->traitDateFormat, $value);
            $new = $this->{$field}->setDate($datetime->year, $datetime->month, $datetime->day);
        } else {
            $this->traitNullRequested[$field]['date'] = true;
        }

        $this->attributes[$field] = $new->format($this->traitDateTimeFormat);
        $this->dtCheckFieldNullRequested($field);
    }

    /**
     * @param  model-property<self>  $field
     */
    private function dtGetTime($field): ?string
    {
        $value = $this->{$field};

        if (! $value instanceof Carbon) {
            return null;
        }

        return $value->format($this->traitTimeFormat);
    }

    /**
     * @param  model-property<self>  $field
     */
    private function dtSetTime($field, ?string $value): void
    {
        $this->initializeDate($field);
        $new = $this->{$field}->setTime(0, 0, 0);

        if ($value !== null) {
            $datetime = Carbon::createFromFormat($this->traitTimeFormat, $value);
            $new = $this->{$field}->setTime($datetime->hour, $datetime->minute, 0);
        } else {
            $this->traitNullRequested[$field]['time'] = true;
        }

        $this->attributes[$field] = $new->format($this->traitDateTimeFormat);
        $this->dtCheckFieldNullRequested($field);
    }

    /**
     * @param  model-property<self>  $field
     */
    private function dtCheckFieldNullRequested($field): void
    {
        $nullRequestedOnAllFields = array_reduce($this->traitNullRequested[$field], fn ($a, $carry) => $a && $carry, true);

        if ($nullRequestedOnAllFields) {
            $this->attributes[$field] = null;
        }
    }
}
