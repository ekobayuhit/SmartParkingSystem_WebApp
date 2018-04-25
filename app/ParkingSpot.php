<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkingSpot extends Model
{
    protected $fillable=['spot', 'occupied'];

    public function HasReservation(){
        return $this->hasOne('App\Reservation', 'parkingspot', 'spot');
    }
}
