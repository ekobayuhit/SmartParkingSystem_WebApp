@extends('layouts.app')

@section('navbar')
@include('partials.nav')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-8 col-sm-12">
            <br><br><br>
            <div class="card">
                <div class="card-header">
                  <h5><b>Reservations</b></h5>
                  <small> Refresh page to update data </small>
                </div>
                <div class="card-body">
                  @if($reservations!=NULL)
                    <table class ="table table-responsive">
                      <tr>
                        <td class="col-lg-2 col-sm-1"><b> id </b></td>
                        <td class="col-lg-3 col-sm-2"><b> User </b></td>
                        <td class="col-lg-2 col-sm-1"><b> Parkingspot </b></td>
                        <td class="col-lg-2 col-sm-1"><b> Status </b></td>
                        <td class="col-lg-3 col-sm-2"><b> Time Start </b></td>
                        <td class="col-lg-3 col-sm-2"><b> Created at </b></td>
                        <td class="col-lg-3 col-sm-1"><b> Action </b></td>
                      </tr>
                      <tbody>
                        @foreach ($reservations as $reservation)
                          <tr>
                          <td class="col-lg-2 col-sm-1"> {{$reservation['id']}} </td>
                          <td class="col-lg-3 col-sm-2"> {{$reservation['userid']}} </td>
                          <td class="col-lg-2 col-sm-1"> {{$reservation['parkingspot']}} </td>
                          <td class="col-lg-2 col-sm-1"> {{$reservation['status']}} </td>
                          <td class="col-lg-3 col-sm-2"> {{$reservation['time_start']}} </td>
                          <td class="col-lg-3 col-sm-2"> {{$reservation['created_at']}} </td>
                          @if($reservation['status']=="0")
                          <td class="col-lg-3 col-sm-1">
                            <form action="{{ route('reservation_cancel', $reservation) }}" method="POST">
                              @csrf
                              {{method_field('delete')}}
                              <button type="submit" class="btn btn-xs btn-danger">
                                <div style="color:white;text-shadow:2px 3px 5px black" >
                                  Cancel
                                </div>
                              </button>
                            </form>
                          </td>
                          @endif
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
