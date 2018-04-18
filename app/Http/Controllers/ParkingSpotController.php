<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkingSpot;

class ParkingSpotController extends Controller
{
    public function index()
    {
        $parkingspots = ParkingSpot::all()->toArray();
        return view('home', compact('parkingspots'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //$response = "Data Created";
        //return response()->json($response, 201);
    }


    public function show($id)
    {

    }

    public function edit($id)
    {
        //
    }

    //update via api
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParkingSpot $parkingspot)
    {
        $parkingspot->delete();

        redirect->back();
    }
}
