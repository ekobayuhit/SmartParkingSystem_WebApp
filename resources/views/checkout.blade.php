@extends('layouts.app')

@section('navbar')
@include('partials.nav')
@endsection

@section('content')
  <div class="container">
    <br>
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-8 col-sm-10">
        <br><br>
        <h3 style="color:#007bff;"><b>Check Out Success</b></h3>
        <h5 style="color:#007bff;"> Thank You {{Auth::user()->name}} </h5>
        <br><br>

        <div class="card">
            <div class="card-header" style="background-color:purple;color:white;text-shadow:2px 3px 5px black">Struct</div>
            <div class="card-body">
              <table class ="table table-striped">
                <tbody>
                    <tr><td class="col-lg-4 col-md-4 col-sm-5"><b> id </b></td>
                      <td class="col-bg-4 col-md-4 col-sm-5">{{ $struct['id'] }}</td>
                    </tr>
                    <tr><td class="col-lg-4 col-md-4 col-sm-5"><b> User </b></td>
                      <td class="col-lg-4 col-md-4 col-sm-5" id="id_parkingspot">{{ $struct['user'] }}</td>
                    </tr>
                    <tr><td class="col-lg-4 col-md-4 col-sm-5"><b> Spot </b>
                      <td class="col-lg-4 col-md-4 col-sm-5">{{ $struct['parkingspot'] }}</td>
                    </tr>
                    <tr><td class="col-lg-4 col-md-4 col-sm-5"><b> Time Start </b></td>
                      <td class="col-lg-4 col-md-4 col-sm-5">{{ $struct['time_start'] }}</td>
                    </tr>
                    <tr><td class="col-lg-4 col-md-4 col-sm-5"><b> Time End </b></td>
                      <td class="col-lg-4 col-md-4 col-sm-5">{{ $struct['time_end'] }}</td>
                    </tr>
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
    <br><br>
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-8 col-sm-10">
            <form action="{{ route('reservation_home') }}" method="GET">
              <button type="submit" class="btn btn-xs btn-primary">
                <div style="color:white;text-shadow:2px 3px 5px black" >
                  Back to Home
                </div>
              </button>
            </form>
        </div>
    </div>
    <br><br><br><br>
  </div>
@endsection
