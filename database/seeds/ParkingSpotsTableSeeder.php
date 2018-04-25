<?php

use Illuminate\Database\Seeder;
use App\ParkingSpot;

class ParkingSpotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $spot = ['A0', 'A1','A2', 'A3', 'A4', 'A5', 'A6', 'A7'];

      for($i=0; $i<count($spot); $i++) {
        ParkingSpot::create([
          'spot'  => $spot[$i],
          'occupied'  => '0',
        ]);
      }
    }
}
