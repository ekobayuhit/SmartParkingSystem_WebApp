<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkingSpot;
use App\Reservation;
use App\LogReservation;
use App\User;

class DashboardController extends Controller
{
    public function index(){
      $num_parkingspot=count(ParkingSpot::all());

      $num_reservation_now=count(Reservation::all());

      $total_logreservation=count(LogReservation::all());
      
      $num_user=count(User::all())-1;

      return view('dashboard', compact('num_parkingspot', 'num_reservation_now', 'total_logreservation', 'num_user'));
    }

}
