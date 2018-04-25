@extends('layouts.app')

@section('navbar')
@include('partials.nav')
@endsection

@section('content')
<div class="img" style="background-image: url('img/1.jpg');background-position:center;background-repeat: no-repeat;background-size: cover;">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-justify" style="color:white;text-shadow:2px 4px 5px black">
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
          <button type="submit" class="btn btn-lg  btn-default btn-outline-primary">
            <div style="color:white;text-shadow:2px 3px 5px black" >
              <span class="fa fa-book"></span>
              <b>Book a Parking Spot</b>
            </div>
          </button>
        </form>
        <br><br><br>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <br><br><br>
  <div class="text-center">
    <h4> <b> Benefit </b> </h4>
    <p></p>
  </div>
  <div id="benefit" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner justify-content-center text-center">
      <div class="carousel-item active">
        <div class="row text-center" style="color:white;text-shadow:2px 4px 5px black">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="card card-img">
              <div class="img-thumbnail" style="background-image: url('img/benefit-1.jpeg');background-position:center;background-repeat: no-repeat;background-size: cover;">
                <br>
                <span class="fa-stack fa-3x">
                  <i class="fa fa-circle fa-stack-2x fa-pulse" style="color:indigo"></i>
                  <i class="fa fa-mobile-phone fa-stack-1x"></i>
                </span>
                <h5> Easy To Make Reservation On Your Way with Your Smartphone </h5>
                <br>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="card card-img">
              <div class="img-thumbnail" style="background-image: url('img/benefit-2.jpg');background-position:center;background-repeat: no-repeat;background-size: cover;">
                <br>
                <span class="fa-stack fa-3x">
                  <i class="fa fa-circle fa-stack-2x fa-pulse" style="color:#dc3040"></i>
                  <i class="fa fa-cloud fa-stack-1x"></i>
                </span>
                <h5> High Availability and Scalability Cloud Server Web App </h5>
                <br>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="card card-img">
              <div class="img-thumbnail" style="background-image: url('img/benefit-3.jpg');background-position:center;background-repeat: no-repeat;background-size: cover;">
                <br>
                <span class="fa-stack fa-3x">
                  <i class="fa fa-circle fa-stack-2x fa-pulse" style="color:teal"></i>
                  <i class="fa fa-microchip fa-stack-1x"></i>
                </span>
                <h5> Array Sensor Devices Powered by Arduino Microcontroller </h5>
                <br>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="row text-center" style="color:white;text-shadow:2px 4px 5px black">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="card card-img">
              <div class="img-thumbnail" style="background-image: url('img/benefit-4.jpg');background-position:center;background-repeat: no-repeat;background-size: cover;">
                <br>
                <span class="fa-stack fa-3x">
                  <i class="fa fa-circle fa-stack-2x fa-pulse" style="color:cyan"></i>
                  <i class="fa fa-star fa-stack-1x"></i>
                </span>
                <h5> Fabricated with High Grade Materials by Our Expert Team </h5>
                <br>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="card card-img">
              <div class="img-thumbnail" style="background-image: url('img/benefit-5.jpg');background-position:center;background-repeat: no-repeat;background-size: cover;">
                <br>
                <span class="fa-stack fa-3x">
                  <i class="fa fa-circle fa-stack-2x fa-pulse" style="color:blue"></i>
                  <i class="fa fa-laptop fa-stack-1x"></i>
                </span>
                <h5> Remote Monitoring and Perform Analytic Anywhere Anytime </h5>
                <br>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="card card-img">
              <div class="img-thumbnail" style="background-image: url('img/benefit-6.jpg');background-position:center;background-repeat: no-repeat;background-size: cover;">
                <br>
                <span class="fa-stack fa-3x">
                  <i class="fa fa-circle fa-stack-2x fa-pulse" style="color:gray"></i>
                  <i class="fa fa-check fa-stack-1x" style="color:white"></i>
                </span>
                <h5> Fully Interconnected System with Smart Management </h5>
                <br>
              </div>
            </div>
          </div>
          <br><br><br>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#benefit" data-slide="prev">
      <span class="fa fa-arrow-circle-left" style="color:blue"></span>
    </a>
    <a class="carousel-control-next" href="#benefit" data-slide="next">
      <span class="fa fa-arrow-circle-right" style="color:blue"></span>
    </a>
  </div>
</div>
@endsection

@section('footer')
@include('partials.footer')
@endsection
