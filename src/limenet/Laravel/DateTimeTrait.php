<?php

namespace limenet\Laravel;

use Carbon\Carbon;

trait DateTimeTrait {
    public function getFullnameAttribute()
    {
        return $this->type->name.': '.$this->name;
    }

    private function initializeDate($field)
    {
        if (!$this->{$field}) {
            $this->{$field} = new Carbon();
        }
    }

    private function dtGetDate($field)
    {
        return $this->{$field} ? $this->{$field}->format('Y-m-d') : null;
    }

    private function dtSetDate($field, $value)
    {
        $this->initializeDate($field);
        if (!$value) {
            $new = $this->{$field}->setDate(0, 0, 0);
        } else {
            $dt = Carbon::createFromFormat('Y-m-d', $value);
            $new = $this->{$field}->setDate($dt->year, $dt->month, $dt->day);
        }

        $this->attributes[$field] = $new->format('Y-m-d H:i:s');
    }

    private function dtGetTime($field)
    {
        return $this->{$field} ? $this->{$field}->format('H:i') : null;
    }

    private function dtSetTime($field, $value)
    {
        $this->initializeDate($field);
        if (!$value) {
            $new = $this->{$field}->setTime(0, 0, 0);
        } else {
            $dt = Carbon::createFromFormat('H:i', $value);
            $new = $this->{$field}->setTime($dt->hour, $dt->minute, 0);
        }

        $this->attributes[$field] = $new->format('Y-m-d H:i:s');
    }
}