@extends('layouts.app')

@section('navbar')
@include('partials.nav')
@endsection

@section('content')
<script>
  function reload_parkingspots() {
      var response = null;
      var out = null;
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET", "api/sensor", true);
      xmlhttp.setRequestHeader("x-csrf-token", "soedirmanmoeda");
      xmlhttp.setRequestHeader("Accept", "application/json");
      xmlhttp.setRequestHeader("Content-Type", "application/json; charset=utf-8");
      xmlhttp.onreadystatechange = function () {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
          response = JSON.parse(xmlhttp.responseText);
          console.log(response);
          for(var i=0;i<response.length;i++){
            if(i==0){
                out = "<tr><td>"+response[i]['spot']+"</td>";
            }else{
                out += "<tr><td>"+response[i]['spot']+"</td>";
            }
            out += "<td>"+response[i]['occupied']+"</td>";
            out += "<td>"+response[i]['updated_at']+"</td></tr>";
          }
          document.getElementById("parkingspot").innerHTML = out;
        }
      }
      xmlhttp.send();
  };
  setInterval(reload_parkingspots, 1000);
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-8 col-sm-10">
            <br><br><br>
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-lg-8 col-md-6 col-sm-8">
                      <h5><b>Parking Spots</b></h5>
                      <small>Update automatically, no need to refresh page</small>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2">
                      <div class="row">
                        <button data-toggle="modal" href="#add_spot" class="btn btn-sm  btn-primary">
                            <div style="color:white;text-shadow:2px 3px 5px black" >Add new parking spot</div>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <table class ="table table-responsive">
                      <tr>
                        <td class="col-lg-3 col-md-2 col-sm-3"><b> Spot </b></td>
                        <td class="col-lg-2 col-md-2 col-sm-3"><b> Occupied </b></td>
                        <td class="col-lg-3 col-md-2 col-sm-3"><b> Update at </b></td>
                      </tr>
                      <tbody id="parkingspot"></tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="portfolio-modal modal fade" id="add_spot" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl"></div>
        </div>
      </div>
      <div class="modal-body">
        <div class="card" style="opacity:0.85">
          <div class="card-header"><strong>Add new parking spot</strong></div>
          <div class="card-body">
            <form method="POST" action="{{ route('add_spot') }}">
              @csrf
              <div class="form-group row">
                <label class="col-md-4 col-sm-12 col-form-label text-md-right"><strong>Spot Name</strong></label>
                <div class="col-md-6 col-sm-12">
                    <input id="spotname" type="text" class="form-control{{ $errors->has('spotname') ? ' is-invalid' : '' }}" name="spotname" value="{{ old('spotname') }}" required>
                    @if ($errors->has('spotname'))
                      <span class="invalid-feedback">
                        <strong>{{ $errors->first('spotname') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Save') }}
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
