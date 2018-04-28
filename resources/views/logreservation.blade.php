@extends('layouts.app')

@section('navbar')
  @include('backend.partials.nav')
@endsection

@section('content')
<div class="container">
    <div class="row pt-5 justify-content-center">
        <div class="col-lg-9 col-md-10 col-sm-12 col-sm-12">
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
            <div class="card">
                <div class="card-header">
                  <h5><b>Log Reservations</b></h5>
                  <div class="row">
                    <form method="GET" action="">
                      <button type="submit" class="btn btn-xs btn-success">
                        <span class="fa fa-file-excel-o"></span> Export All to Excel
                      </button>
                    </form>
                    <form method="POST" action="">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-xs btn-danger">
                        <span class="fa fa-trash"></span> Clear All
                      </button>
                    </form>
                  </div>
                </div>
                <div class="card-body">
                  <table class ="table table-responsive">
                    <tr>
                      <td><b> id </b></td>
                      <td><b> Username </b></td>
                      <td><b> Email </b></td>
                      <td><b> Parking Spot </b></td>
                      <td><b> Time Start </b></td>
                      <td><b> Time End </b></td>
                      <td><b> Created at </b></td>
                    </tr>
                    <tbody>
                      @foreach ($logs as $log)
                        <tr>
                          <td> {{$log['id']}} </td>
                          <td> {{$log['user']}} </td>
                          <td> {{$log['email']}} </td>
                          <td> {{$log['parkingspot']}} </td>
                          <td> {{$log['time_start']}} </td>
                          <td> {{$log['time_end']}} </td>
                          <td> {{$log['created_at']}} </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="row justify-content-end"> {{ $logs->links() }} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
