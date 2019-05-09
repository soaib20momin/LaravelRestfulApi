<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

Class WeatherStats extends Model
{
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}