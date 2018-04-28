@extends('layouts.app')

@section('navbar')
  @include('partials.nav')
@endsection

@section('content')
<div id="checkout-page">
  <div class="container">
    <div class="row mt-3 justify-content-center">
      <div class="col-lg-8 col-md-8 col-sm-10">
        <h3 class="text-white"><b>Check Out Success</b></h3>
        <h5 class="text-white"> Thank You {{Auth::user()->name}} </h5>
        <div class="card mt-3" style="background:rgba(52, 98, 158, 0.7);">
            <div class="card-header" style="background-color:purple;color:white;text-shadow:2px 3px 5px black">
              <span class="ion ion-ios-pricetag"> Invoice </span>
            </div>
            <div class="card-body text-white">
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
    <div class="row mt-3 justify-content-center">
        <div class="col-lg-8 col-md-8 col-sm-10">
            <form action="{{ route('reservation_home') }}" method="GET">
              <button type="submit" class="btn btn-xs btn-primary">
                <div style="color:white;text-shadow:2px 3px 5px black">
                  <span class="ion ion-home"></span>
                  Back to Home
                </div>
              </button>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection

@section('footer')
  @include('partials.footer')
@endsection
