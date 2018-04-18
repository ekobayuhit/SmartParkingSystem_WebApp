@extends('layouts.app')

@section('content')

<div class="img-fluid" style="background-image: url('img/1.jpg');background-position:center;background-repeat: no-repeat;background-size: cover;">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-sm-1" style="color:white;text-shadow:2px 4px 5px black">
        <br><br><br>
        @auth
            <h4> Welcome {{Auth::user()->name}} </h4>
        @else
            <h4> Welcome  </h4>
        @endauth
        <br> <br>
        <p>Due to the high demand on parking spot, it is more difficult just to get parking spot
        and sometimes it made you messing arround waste your time and fuel.</p>
        <p>In order to solving your problem, We integrate sensing device that installed on the parking
        spot and web app to brings to you a new experience of getting parking spot in easy way.</p>
        <p>With this our new service, you can order parking spot on your way  and most importanly
        it is saving your time.</p>
        <br>
        <form action="{{ route('reservation_home') }}" method="GET">
          <button type="submit" class="btn btn-lg  btn-primary">
            <div style="color:white;text-shadow:2px 3px 5px black" >Book a Parking Spot </div>
          </button>
        </form>
        <br><br>
      </div>
    </div>
  </div>
</div>

@include('partials.footer')

@endsection
