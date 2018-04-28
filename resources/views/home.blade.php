@extends('layouts.app')

@section('navbar')
@include('partials.nav')
@endsection

@section('content')
<div id="member-reservation-page">
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  @if($reservation !=NULL)
    <script>
        function check_occupied_spot() {
            var response = null;
            var spot=document.getElementById("id_parkingspot").innerHTML;
            var url="api/parkingspot/"+spot;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", url, true);
            xmlhttp.setRequestHeader("x-csrf-token", "soedirmanmoeda");
            xmlhttp.setRequestHeader("Accept", "application/json");
            xmlhttp.setRequestHeader("Content-Type", "application/json; charset=utf-8");
            xmlhttp.onreadystatechange = function () {
              if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                response = JSON.parse(xmlhttp.responseText);
                if(response[0]['occupied'] == 1){
                  document.getElementById("validate_button").style.display='';
                  document.getElementById("cancel_button").style.display = 'none';
                }else{
                  document.getElementById("validate_button").style.display = 'none';
                  document.getElementById("cancel_button").style.display='';
                }
              }
            }
            xmlhttp.send();
        };
        setInterval(check_occupied_spot, 1000);
    </script>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="card text-white mt-3" style="background:rgba(52, 98, 158, 0.7);">
            <div class="card-header" style="background-color:purple;color:white;text-shadow:2px 3px 5px black">Reservation</div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><b> id </b> : {{ $reservation->id }} </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><b> username </b> : {{ $reservation->userid }} </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <b> Status </b> : {{ $reservation->status }}
                  <small><i>[0->not validated; 1->validated]</i></small>
                </div>
                @if($reservation->status == "1")
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <b> Time Start </b> : {{ $reservation->time_start }}
                  </div>
                @endif
              </div>
              <hr>
              <div class="row text-center">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <b> Parking spot </b><a href="#" class="ion ion-information-circled"> <span>See map</span></a>
                  <div id="id_parkingspot" style="font-size:400%;text-shadow:2px 4px 5px black">{{ $reservation->parkingspot }}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="card text-white mt-3" style="background:rgba(52, 98, 158, 0.7);">
            <div class="card-header" style="background-color:purple;color:white;text-shadow:2px 3px 5px black">Action</div>
            <div class="card-body">
              @if($reservation->status == "1")
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    Please enjoy your day, to check out please press button below
                    <br>
                    <form action="{{ route('reservation_checkout', $reservation) }}" method="POST">
                      @csrf
                      {{method_field('delete')}}
                      <button type="submit" class="btn btn-xs btn-danger">
                        <div style="color:white;text-shadow:2px 3px 5px black" >
                          <span class="ion ion-ios-calculator-outline"></span>
                          Check Out
                        </div>
                      </button>
                    </form>
                  </div>
                </div>
              @else
                <div id="validate_button" style="display:none">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      Someone has arrived at {{$reservation->parkingspot}} ,
                        please press button below to validate that its you.
                      <br>
                      <form action="{{ route('reservation_validate', $reservation) }}" method="POST">
                        @csrf
                        {{method_field('put')}}
                        <button type="submit" class="btn btn-xs btn-primary">
                          <div style="color:white;text-shadow:2px 3px 5px black">
                            <span class="ion ion-checkmark"></span>
                            Validate
                          </div>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
                <div id="cancel_button">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <p> Dont worry about not validated yet, our sensing device will sensing the presence of
                        your car when you've arrived on the spot and send you notification.
                      </p>
                      <p>No need to refresh the page.</p>
                      <br>
                      <form action="{{ route('reservation_cancel', $reservation) }}" method="POST">
                        @csrf
                        {{method_field('delete')}}
                        <button type="submit" class="btn btn-xs btn-danger">
                          <div style="color:white;text-shadow:2px 3px 5px black">
                            <span class="ion ion-ios-close-outline"></span>
                            Cancel
                          </div>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  @else
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
            if(response!=0){
              document.getElementById("spotavailable").style.display='';
            }else{
              document.getElementById("spotavailable").style.display = 'none';
            }
          }
        }
        xmlhttp.send();
      };
      setInterval(check_freespot, 1000);
    </script>
    <div class="container-fluid mt-3">
      <div class="row justify-content-center">
        <div class="card col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background:rgba(52, 98, 158, 0.7);">
          <div class="card-body text-white text-center">
            <h5> Free Parking Spots </h5>
            <div id="freespots" style="font-size:900%;text-shadow: 4px 4px 7px black">{{$count_parkingspot}}</div>
            <br>
            <div id="spotavailable">
              <form action="{{ route('reservation_create') }}" method="GET">
                <button type="submit" class="btn btn-xs btn-light">
                  <i class="ion ion-ios-book-outline"></i> Make a reservation
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
</div>
@endsection

@section('footer')
  @include('partials.footer')
@endsection
