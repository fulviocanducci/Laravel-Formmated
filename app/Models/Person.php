<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'peoples';

    protected $fillable = [
        'name',
        'value',
        'status',
        'birthday'
    ];

    protected $appends = [
        'birthday_br',
        'value_br'
    ];

    public function getBirthdayBrAttribute()
    {
        if ($d = date_create_from_format("Y-m-d", $this->attributes['birthday'])) {
            return $d->format("d/m/Y");
        }
        return null;
    }

    public function getValueBrAttribute()
    {
        if (isset($this->attributes['value']) && is_numeric($this->attributes['value'])) {
            return number_format($this->attributes['value'], 2, ",", ".");
        }
        return null;
    }
}
