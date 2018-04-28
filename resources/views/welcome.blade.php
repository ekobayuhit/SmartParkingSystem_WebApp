@extends('layouts.app')

@section('navbar')
  @include('partials.nav')
@endsection

@section('content')
<div id="header-welcome" class="img-fluid">
  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-white" style="text-shadow:2px 3px 5px black">
        <div class="animated fadeIn">
          @auth
              <h4> Welcome {{Auth::user()->name}} </h4>
          @else
              <h4> Welcome </h4>
          @endauth
            <h2>
              <b>Now You Just need a few Clicks to Reserve</b>
            </h2>
            <i><p>Due to the high demand on parking spot, it is more difficult just to park your car
              and sometimes it made you messing arround waste your time and fuel.</p>
            <p>In order to solving your problem, We integrate sensing device that installed on
              the parking spot with web app to brings to you a new experience of getting parking
              spot in easy way.</p>
            <p>With this our new service, you can order parking spot on your way and most
              importanly it's just need a few clicks.</p></i>
        </div>
      </div>
      <div id="sm-logo-welcome-header" class="col-lg-3 col-md-3 ml-auto mt-3">
        <div class="row mt-5">
          <img class="img-fluid animated flipInX" src="{{ asset('img/sm-logo-blue.png') }}" href="http://soedirmanmoeda.herokuapp.com" alt="soedirman-moeda-project-logo"></img>
        </div>
        <div class="row mt-3 justify-content-center animated flipInY">
          <small>
            <a class="fa-stack fa-2x text-white" href="#">
              <i class="fa fa-circle fa-stack-2x" style="color:#007bff;"></i>
              <i class="fa fa-facebook fa-stack-1x"></i>
            </a>
            <a class="fa-stack fa-2x text-white" href="#">
              <i class="fa fa-circle fa-stack-2x" style="color:purple"></i>
              <i class="fa fa-instagram fa-stack-1x"></i>
            </a>
            <a class="fa-stack fa-2x text-white" href="http://soedirmanmoeda.herokuapp.com/">
              <i class="fa fa-circle fa-stack-2x" style="color:#dc3545"></i>
              <i class="fa fa-home fa-stack-1x"></i>
            </a>
          </small>
        </div>
      </div>
    </div>
    <div class="row justify-content-sm-center animated fadeIn">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <form action="{{ route('reservation_home') }}" method="GET">
          <button type="submit" class="btn btn-lg  btn-light">
            <i class="ion ion-android-car"></i><b> Reserve Now</b>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container pt-5">
  <div class="text-center pt-2 animated fadeIn">
    <h4> <b> What We Offer </b> </h4>
    <div class="section-divider"></div>
    <p></p>
  </div>
  <div class="card-group justify-content-center">
    <div class="row text-center text-white" style="text-shadow:2px 4px 5px black">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow animated fadeInUp">
        <div class="card">
          <img class="img" src="{{ asset('img/benefit-1.jpeg') }}" alt="Make Reservation with Smartphone"></img>
          <div class="card-img-overlay">
            <span class="fa-stack fa-3x">
              <i class="fa fa-circle fa-stack-2x" style="color:indigo"></i>
              <i class="fa fa-mobile-phone fa-stack-1x"></i>
            </span>
            <h5> Easy To Make a Reservation with Just a Few Clicks </h5>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow animated fadeInUp">
        <div class="card card-img">
          <img class="img" src="{{ asset('img/benefit-2.jpg') }}" alt="Cloud Server"></img>
          <div class="card-img-overlay">
            <span class="fa-stack fa-3x">
              <i class="fa fa-circle fa-stack-2x" style="color:#dc3040"></i>
              <i class="fa fa-cloud fa-stack-1x"></i>
            </span>
            <h5> High Availability and Scalability Cloud Server Web App </h5>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow animated fadeInUp">
        <div class="card">
          <img class="img" src="{{ asset('img/benefit-3.jpg') }}" alt="Array Sensor"></img>
          <div class="card-img-overlay">
            <span class="fa-stack fa-3x">
              <i class="fa fa-circle fa-stack-2x" style="color:teal"></i>
              <i class="fa fa-microchip fa-stack-1x"></i>
            </span>
            <h5> Array Sensor Devices Powered by Arduino Microcontroller </h5>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow animated fadeInUp">
        <div class="card">
          <img class="img" src="{{ asset('img/benefit-4.jpg')}}" alt="High grade materials"></img>
          <div class="card-img-overlay">
            <span class="fa-stack fa-3x">
              <i class="fa fa-circle fa-stack-2x" style="color:cyan"></i>
              <i class="fa fa-star fa-stack-1x"></i>
            </span>
            <h5> Maintenance On Schedule by Our Expert Team </h5>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow animated fadeInUp">
        <div class="card">
          <img class="img" src="{{ asset('img/benefit-5.jpg') }}" alt="Remote Monitoring"></img>
          <div class="card-img-overlay">
            <span class="fa-stack fa-3x">
              <i class="fa fa-circle fa-stack-2x" style="color:blue"></i>
              <i class="fa fa-laptop fa-stack-1x"></i>
            </span>
            <h5> Remote Monitoring and Perform Analytic Anywhere Anytime </h5>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow animated fadeInUp">
        <div class="card card-img">
          <img class="img" src="{{ asset('img/benefit-6.jpg') }}" alt="Fully interconnected system"></img>
          <div class="card-img-overlay">
            <span class="fa-stack fa-3x">
              <i class="fa fa-circle fa-stack-2x" style="color:gray"></i>
              <i class="fa fa-check fa-stack-1x" style="color:white"></i>
            </span>
            <h5> Fully Interconnected System with Smart Management </h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('footer')
  @include('partials.footer')
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
@endsection
