<?php

namespace App\Http\Controllers;
use App\ParkingSpot;
use App\Reservation;
use App\LogReservation;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(){
        $reservation=auth()->user()->HasReservation;
        if($reservation != NULL){
            $count_parkingspot=NULL;
        }else{
            $reservation=NULL;
            $count_parkingspot=count(ParkingSpot::doesntHave('HasReservation')->get());
        }
        return view('home', compact('count_parkingspot', 'reservation'));
    }

    public function reserve(){
        $user=auth()->user();
        $freeparkingspot=ParkingSpot::doesntHave('HasReservation')->first();
        //create reservation
        Reservation::create([
          'userid' => $user->id,
          'parkingspot' => $freeparkingspot->spot,
          'status' => "0",
        ]);
        return redirect()->back();
    }

    public function cancel(Reservation $reservation){
        $reservation->delete();
        return redirect()->back();
    }

    public function Reserved_validation(Reservation $reservation) {
      $reservation->status = "1";
      $reservation->time_start = date('H:i:s');
      $reservation->save();
      return redirect()->back();
    }

    public function checkout(Reservation $reservation){
      $user=auth()->user();
      //create log data
      $struct=LogReservation::create([
          'user' => $user->name,
          'email' => $user->email,
          'parkingspot' => $reservation->parkingspot,
          'time_start' => $reservation->time_start,
          'time_end' => date('H:i:s'),
      ]);
      $reservation->delete();
      return view('checkout', compact('struct'));
    }
}
