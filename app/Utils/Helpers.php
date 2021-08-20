<?php

use Carbon\Carbon;

function date_db($value): ?string
{
    if ($value) 
    {
        if ($d = Carbon::createFromFormat("d/m/Y", $value)) {
            return $d->format("Y-m-d");
        }
    }
    return null;
}

function date_br($value): ?string
{
    if ($value) {
        if ($d = Carbon::createFromFormat("Y-m-d", $value)) {
            return $d->format("d/m/Y");
        }
    }
    return null;
}

function decimal_db($value): ?float
{
    return floatval(str_replace(['.',','], ['','.'], $value));
}

function decimal_br($value): ?string
{
    return number_format($value, 2, ',', '.');
}

function bool_db($value): int
{
    return isset($value) ? 1 : 0;
}
