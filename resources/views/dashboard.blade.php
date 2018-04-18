@extends('layouts.app')

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
            out += "<td>"+response[i]['booked']+"</td>";
            out += "<td>"+response[i]['created_at']+"</td></tr>";
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
        <div class="col-lg-12 col-md-8 col-sm-1">
            <div class="card">
                <div class="card-header">
                  <h5><b>Parking Spots</b></h5>
                  <small>Update automatically, no need to refresh page</small>
                </div>
                <div class="card-body">
                  <table class ="table table-responsive">
                      <tr>
                        <td class="col-bg-3 col-sm-1"><b> Spot </b></td>
                        <td class="col-bg-3 col-sm-1"><b> Occupied </b></td>
                        <td class="col-bg-3 col-sm-1"><b> Booked </b></td>
                        <td class="col-bg-3 col-sm-1"><b> Update at </b></td>
                      </tr>
                      <tbody id="parkingspot"></tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
