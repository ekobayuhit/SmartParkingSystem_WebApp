<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkingSpot;
use App\Reservation;
use App\LogReservation;
use App\User;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){

      $this->validate($request, [
          'spotname' => 'required|string|max:255',
      ]);

      ParkingSpot::create([
        'spot'      => $request->spotname,
        'occupied'  => '0',
      ]);

      return redirect()->back();
    }

    public function edit(Request $request){
        ParkingSpot::all()->toArray();

        return redirect()->back();
    }

    public function show_parkingspots()
    {
      return view('dashboard');
    }

    public function show_reservations()
    {
      $reservations = Reservation::all()->toArray();

      for($i=0;$i<count($reservations);$i++) {
          $reservations[$i]['userid']=Reservation::find($reservations[$i]['id'])->belongsToUser->name;
      }

      return view('reservations', compact('reservations'));
    }

    public function log_reservations(){
      $logs=LogReservation::all()->toArray();

      return view('logreservation', compact('logs'));
    }
}
