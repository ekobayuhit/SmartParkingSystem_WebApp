<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogReservation;

class LogReservationController extends Controller
{
  public function index(){
    $logs=LogReservation::paginate(10);
    return view('logreservation', compact('logs'));
  }
}
