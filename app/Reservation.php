<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['userid', 'parkingspot', 'status'];

    public function belongsToParkingspot(){
        return $this->belongsTo('App\ParkingSpot', 'parkingspot', 'spot');
    }

    public function belongsToUser(){
        return $this->belongsTo('App\User', 'userid');
    }

}
