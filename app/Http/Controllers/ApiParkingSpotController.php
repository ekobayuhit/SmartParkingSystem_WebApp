<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkingSpot;
use App\Http\Resources\ParkingSpotTransformer as SpotResources;

class ApiParkingSpotController extends Controller
{
    public function index()
    {
      $response=ParkingSpot::all()->toArray();
      return response()->json($response, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    //localhost:8000/api/sensor/3
    public function show($id)
    {
        $response = new SpotResources(ParkingSpot::find($id));
        return response()->json($response, 200);
    }

    public function status_spot($spot){
      $response=ParkingSpot::where('spot','=',$spot)->get()->toArray();
      return response()->json($response, 200);
    }

    public function edit($id)
    {
        //
    }

    //localhost:8000/api/sensor/1?field=0
    public function update(Request $request, $id)
    {
      $parkingspot=ParkingSpot::find($id);
      $parkingspot->occupied=$request->field;
      $parkingspot->save();

      $response="Success updated field";
      return response()->json($response, 200);
    }

    //localhost:8000/api/sensorall?f1=1&f2=1&f3=1&f4=1&f5=1&f6=1&f7=1&f8=1
    public function updateAll(Request $request)
    {
      $field=[
        $request->f1,
        $request->f2,
        $request->f3,
        $request->f4,
        $request->f5,
        $request->f6,
        $request->f7,
        $request->f8,
      ];

      for($i=0;$i<8;$i++) {
        $parkingspot=ParkingSpot::find($i+1);
        $parkingspot->occupied=$field[$i];
        $parkingspot->save();
      }
      $response="Success updated all field";
      return response()->json($response, 200);
    }

    public function destroy($id)
    {
        //
    }
}
