<?php

namespace App\Http\Controllers;
use App\ParkingSpot;
use App\Reservation;
use App\LogReservation;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(){

        $user=auth()->user();
        $reservations=Reservation::where('userid','=',$user->id)->get()->toArray();
        if($reservations != NULL){
            $count_parkingspot=NULL;
        }else{
          $reservations=NULL;
          $count_parkingspot=count(ParkingSpot::where('occupied', '=', 0)->where('booked','=','0')->get()->toArray());
        }

        return view('home', compact('count_parkingspot', 'reservations'));
    }

    public function reserve(){
        $user=auth()->user();
        $freeparkingspot=ParkingSpot::where('occupied', '=', 0)->where('booked','=','0')->first();
        //create reservation
        Reservation::create([
          'userid' => $user->id,
          'parkingspot' => $freeparkingspot->spot,
          'status' => "0",
        ]);
        //insert field 'booked' with 1 -> indicate the spot has benn booked
        $freeparkingspot->booked=1;
        $freeparkingspot->save();

        return redirect()->back();
    }

    public function cancel(Reservation $reservation){
        $spot=ParkingSpot::where('spot','=',$reservation->parkingspot)->get()->toArray();
        $parkingspot=ParkingSpot::find($spot[0]['id']);
        $parkingspot->booked=0;
        $parkingspot->save();
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
      LogReservation::create([
          'user' => $user->name,
          'email' => $user->email,
          'parkingspot' => $reservation->parkingspot,
          'time_start' => $reservation->time_start,
          'time_end' => date('H:i:s'),
      ]);

      //release field 'booked' in table parkingspots
      $spot=ParkingSpot::where('spot','=',$reservation->parkingspot)->get()->toArray();
      $parkingspot=ParkingSpot::find($spot[0]['id']);
      $parkingspot->booked=0;
      $parkingspot->save();

      $reservation->delete();

      return view('checkout');
    }
}
