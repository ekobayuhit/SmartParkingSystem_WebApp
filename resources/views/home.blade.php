@extends('layouts.app')

@section('navbar')
@include('partials.nav')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-9 col-sm-10">
          <br><br><br>
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

            <div class="card">
                <div class="card-header" style="background-color:purple;color:white;text-shadow:2px 3px 5px black">Reservation</div>
                <div class="card-body">
                  <table class ="table table-responsive">
                    <tbody>
                        <tr><td class="col-lg-3 col-md-4 col-sm-6"><b> id </b></td>
                          <td class="col-bg-3 col-md-4 col-sm-6">{{ $reservation->id }}</td>
                        </tr>
                        <tr><td class="col-lg-3 col-md-4 col-sm-6"><b> Parking spot </b></td>
                          <td class="col-lg-3 col-md-4 col-sm-6" id="id_parkingspot">{{ $reservation->parkingspot }}</td>
                        </tr>
                        <tr><td class="col-lg-3 col-md-4 col-sm-6"><b> Status </b>
                          <small>[0=not validated, 1="validated"]</small></td>
                          <td class="col-lg-3 col-md-4 col-sm-6">{{ $reservation->status }}</td>
                        </tr>
                        @if($reservation->status == "1")
                          <tr><td class="col-lg-3 col-md-4 col-sm-6"><b> Time Start </b></td>
                            <td class="col-lg-3 col-md-4 col-sm-6">{{ $reservation->time_start }}</td>
                          </tr>
                        @endif
                    </tbody>
                  </table>
                  @if($reservation->status == "1")
                    <tr><td class="col-lg-3 col-md-4 col-sm-6">
                      <div> Please enjoy your day, to check out please press button below
                      </div>
                      <br>
                      <form action="{{ route('reservation_checkout', $reservation) }}" method="POST">
                        @csrf
                        {{method_field('delete')}}
                        <button type="submit" class="btn btn-xs btn-danger">
                          <div style="color:white;text-shadow:2px 3px 5px black" >
                            Check Out
                          </div>
                        </button>
                      </form>
                    </td></tr>
                  @else
                  <div id="validate_button" style="display:none">
                    <tr><td class="col-lg-3 col-md-4 col-sm-6">
                      <div> Someone has arrived at {{$reservation->parkingspot}} ,
                        please press button below to validate that its you.
                      </div>
                      <br>
                      <form action="{{ route('reservation_validate', $reservation) }}" method="POST">
                        @csrf
                        {{method_field('put')}}
                        <button type="submit" class="btn btn-xs btn-primary">
                          <div style="color:white;text-shadow:2px 3px 5px black" >
                            Validate
                          </div>
                        </button>
                      </form>
                    </td></tr>
                  </div>
                  <div id="cancel_button">
                    <tr><td class="col-lg-3 col-md-4 col-sm-6">
                      <p> Dont worry about not validated yet, our sensing device will sensing the presence of
                        your car when you've arrived on the spot and send you validation notification.
                      </p>
                      <p>No need to refresh the page.</p>
                      <br>
                      <form action="{{ route('reservation_cancel', $reservation) }}" method="POST">
                        @csrf
                        {{method_field('delete')}}
                        <button type="submit" class="btn btn-xs btn-danger">
                          <div style="color:white;text-shadow:2px 3px 5px black" >
                            Cancel
                          </div>
                        </button>
                      </form>
                    </td></tr>
                  </div>
                  @endif
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
            <div class="row justify-content-center">
              <div class="card col-lg-12 col-md-12 col-sm-12 col-xs-12" style="color:white;background-color:purple;">
                <div class="card-body text-center">
                  <h5> Free Parking Spots </h5>
                  <div id="freespots" style="font-size:900%;text-shadow: 4px 4px 7px black">{{$count_parkingspot}}</div>
                  <br>
                  <div id="spotavailable">
                    <form action="{{ route('reservation_create') }}" method="GET">
                      <button type="submit" class="btn btn-xs btn-primary">
                        <div style="color:white;text-shadow:2px 3px 5px black" >
                          Make reservation
                        </div>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          @endif
        </div>

    </div>
</div>
@endsection
