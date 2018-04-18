<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogReservation extends Model
{
    protected $fillable = ['user', 'email', 'parkingspot', 'time_start', 'time_end'];
}
