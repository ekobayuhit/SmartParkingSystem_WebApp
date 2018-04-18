@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-8 col-sm-1">
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
            <div class="card">
                <div class="card-header">
                  <h5><b>Log Reservations</b></h5>
                </div>
                <div class="card-body">
                  <table class ="table table-responsive">
                    <tr>
                      <td class="col-bg-3 col-sm-1"><b> id </b></td>
                      <td class="col-bg-3 col-sm-1"><b> Username </b></td>
                      <td class="col-bg-3 col-sm-1"><b> Email </b></td>
                      <td class="col-bg-3 col-sm-1"><b> Parking Spot </b></td>
                      <td class="col-bg-3 col-sm-1"><b> Time Start </b></td>
                      <td class="col-bg-3 col-sm-1"><b> Time End </b></td>
                      <td class="col-bg-3 col-sm-1"><b> Created at </b></td>
                    </tr>
                    <tbody>
                      @foreach ($logs as $log)
                        <tr>
                          <td class="col-bg-3 col-sm-1"> {{$log['id']}} </td>
                          <td class="col-bg-3 col-sm-1"> {{$log['user']}} </td>
                          <td class="col-bg-3 col-sm-1"> {{$log['email']}} </td>
                          <td class="col-bg-3 col-sm-1"> {{$log['parkingspot']}} </td>
                          <td class="col-bg-3 col-sm-1"> {{$log['time_start']}} </td>
                          <td class="col-bg-3 col-sm-1"> {{$log['time_end']}} </td>
                          <td class="col-bg-3 col-sm-1"> {{$log['created_at']}} </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
