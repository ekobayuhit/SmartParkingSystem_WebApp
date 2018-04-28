@extends('layouts.app')

@section('navbar')
  @include('backend.partials.nav')
@endsection

@section('content')

<script>/*
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
  setInterval(reload_parkingspots, 1000);*/
</script>

<div class="container">
    <div class="row pt-5 justify-content-center">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                  <h5><b>Parking Spots</b></h5>
                  <button data-toggle="modal" href="#add_spot" class="btn btn-sm  btn-primary">
                    <div style="color:white;text-shadow:2px 3px 5px black" >
                      <span class="ion ion-android-car"></span> Add New
                    </div>
                  </button>
                </div>
                <div class="card-body">
                  <table class ="table table-responsive">
                      <tr>
                        <td><b> id </b></td>
                        <td><b> Spot </b></td>
                        <td><b> Occupied </b></td>
                        <td><b> Created at </b></td>
                        <td><b> Update at </b></td>
                        <td><b> Action </b></td>
                      </tr>
                      <tbody>
                        @foreach ($parkingspots as $parkingspot)
                        <tr>
                          <td class="text-center"> {{ $parkingspot['id'] }} </td>
                          <td class="text-center"> {{ $parkingspot['spot'] }} </td>
                          <td class="text-center"> {{ $parkingspot['occupied'] }} </td>
                          <td> {{ $parkingspot['created_at'] }} </td>
                          <td> {{ $parkingspot['updated_at'] }} </td>
                          <td>
                            <div class="form-group row">
                              <div class="col-lg-1 col-md-1 mr-2">
                                <form action="{{ route('parkingspot_edit', $parkingspot) }}" method="GET">
                                  <button type="submit" class="btn btn-xs btn-success">
                                    <span class="fa fa-edit"></span><b></b>
                                  </button>
                                </form>
                              </div>
                              <div class="col-lg-1 col-md-1">
                                <form action="{{ route('parkingspot_delete', $parkingspot) }}" method="POST">
                                  @csrf
                                  @method('delete')
                                  <button type="submit" class="btn btn-xs btn-danger">
                                    <span class="fa fa-trash"></span><b></b>
                                  </button>
                                </form>
                              </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
                  <div class="row justify-content-end"> {{ $parkingspots->links() }} </div>
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
            <form method="POST" action="{{ route('parkingspot_create') }}">
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
