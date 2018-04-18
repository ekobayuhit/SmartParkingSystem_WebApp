@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-8 col-sm-1">
            <div class="card">
                <div class="card-header">
                  <h5><b>Reservations</b></h5>
                  <small> Refresh page to update data </small>
                </div>
                <div class="card-body">
                  @if($reservations!=NULL)
                    <table class ="table table-responsive">
                      <tr>
                        <td class="col-bg-3 col-sm-1"><b> id </b></td>
                        <td class="col-bg-3 col-sm-1"><b> User </b></td>
                        <td class="col-bg-3 col-sm-1"><b> Parkingspot </b></td>
                        <td class="col-bg-3 col-sm-1"><b> Status </b></td>
                        <td class="col-bg-3 col-sm-1"><b> Time Start </b></td>
                      </tr>
                      <tbody>
                        @foreach ($reservations as $reservation)
                          <tr>
                          <td class="col-bg-3 col-sm-1"> {{$reservation['id']}} </td>
                          <td class="col-bg-3 col-sm-1"> {{$reservation['userid']}} </td>
                          <td class="col-bg-3 col-sm-1"> {{$reservation['parkingspot']}} </td>
                          <td class="col-bg-3 col-sm-1"> {{$reservation['status']}} </td>
                          <td class="col-bg-3 col-sm-1"> {{$reservation['time_start']}} </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  @else
                    No reservation has been made.
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
