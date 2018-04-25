@extends('layouts.app')

@section('navbar')
@include('partials.nav')
@endsection

@section('content')
<div class="img-fluid" style="background-image: url('img/3.jpg');background-position:center;background-size:cover;background-repeat: no-repeat;background-color:black">
  <div class="container-fluid">
    <br><br><br><br>
    <div class="row justify-content-center">
      <img class="img-fluid" src="{{ asset('img/sm-logo.png') }}"></img>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right" style="color:white">{{ __('Name') }}</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right" style="color:white">{{ __('E-Mail Address') }}</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right" style="color:white">{{ __('Password') }}</label>
              <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                  @if ($errors->has('password'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right" style="color:white">{{ __('Confirm Password') }}</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Register') }}
                </button>
              </div>
            </div>
          </form>
        </div>
    </div>
    <br><br>
  </div>
</div>
@endsection
