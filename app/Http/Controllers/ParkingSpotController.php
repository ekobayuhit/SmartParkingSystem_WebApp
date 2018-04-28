<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkingSpot;

class ParkingSpotController extends Controller
{
    public function index()
    {
        $parkingspots = ParkingSpot::paginate(10);
        return view('parkingspot', compact('parkingspots'));
    }

    public function store(Request $request)
    {
      $this->validate($request, [
          'spotname' => 'required|string|max:255',
      ]);
      ParkingSpot::create([
        'spot'      => $request->spotname,
        'occupied'  => '0',
      ]);
      return redirect()->route('parkingspot_index');
    }

    public function edit(ParkingSpot $parkingspot)
    {
        return view('parkingspot_edit', compact('parkingspot'));
    }

    public function update(Request $request, ParkingSpot $parkingspot)
    {
        $parkingspot->spot=$request->spotname;
        $parkingspot->update();
        return redirect()->route('parkingspot_index');
    }

    public function destroy(ParkingSpot $parkingspot)
    {
        $parkingspot->delete();
        return redirect()->back();
    }
}
