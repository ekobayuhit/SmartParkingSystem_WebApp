@extends('layouts.app')

@section('navbar')
  @include('backend.partials.nav')
@endsection

@section('content')
<script>
  function check_freespot() {
    var response = null;
    var freespots = 0;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "api/freespots", true);
    xmlhttp.setRequestHeader("x-csrf-token", "soedirmanmoeda");
    xmlhttp.setRequestHeader("Accept", "application/json");
    xmlhttp.setRequestHeader("Content-Type", "application/json; charset=utf-8");
    xmlhttp.onreadystatechange = function () {
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
        response = JSON.parse(xmlhttp.responseText);
        document.getElementById('freespots').innerHTML=response;
      }
    }
    xmlhttp.send();
  };
  setInterval(check_freespot, 1000);
</script>

<div class="container mt-5">
  <div class="row text-center justify-content-center">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="card">
        <div class="card-header">
          <h5><b>Parking Spots</b></h5>
        </div>
        <div class="card-body">
          <div>Total : {{ $num_parkingspot }}</div>
          <hr>
          <div>Free : <span id="freespots"></span></div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="card card-img">
        <div class="card-header">
          <h5><b>Reservation</b></h5>
        </div>
        <div class="card-body">
          <div>Reservation On Going : {{ $num_reservation_now }} </div>
          <hr>
          <div>Success reservation : {{ $total_logreservation }} </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="card">
        <div class="card-header">
          <h5><b>Member</b></h5>
        </div>
        <div class="card-body">
          <div>Total member : {{ $num_user }} </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
