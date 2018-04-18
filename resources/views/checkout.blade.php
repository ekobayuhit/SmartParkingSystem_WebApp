@extends('layouts.app')

@section('content')

<div class="img img-fluid" style="background-image:url('img/2.jpg');background-repeat:no-repeat;background-position:center;background-size: cover;">
  <br><br><br><br>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-sm-1">
        <br><br>
        <h3 style="color:#007bff;"><b>Check Out Success</b></h3>
        <h5 style="color:white;"> Thank You {{Auth::user()->name}} </h5>
        <br><br>
        <form action="{{ route('reservation_home') }}" method="GET">
          <button type="submit" class="btn btn-xs btn-primary">
            <div style="color:white;text-shadow:2px 3px 5px black" >
              Back to Home
            </div>
          </button>
        </form>
      </div>
    </div>
    <br><br><br><br>
  </div>
</div>

@endsection
