<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkingSpot;
use App\Reservation;
use App\LogReservation;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_parkingspots()
    {
      return view('dashboard');
    }

    public function show_reservations()
    {
      $reservations = Reservation::all()->toArray();

      for($i=0;$i<count($reservations);$i++) {
          $user=User::find($reservations[$i]['userid'])->toArray();
          $reservations[$i]['userid']=$user['name'];
      }

      return view('reservations', compact('reservations'));
    }

    public function log_reservations(){
      $logs=LogReservation::all()->toArray();

      return view('logreservation', compact('logs'));
    }
}
