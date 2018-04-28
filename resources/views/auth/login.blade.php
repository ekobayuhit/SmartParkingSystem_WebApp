@extends('layouts.app')

@section('navbar')
  @include('partials.nav')
@endsection

@section('content')
<div id="login-page" class="img-fluid pt-lg-5 pb-lg-5 pt-md-3 pb-md-3 pt-sm-3 pb-sm-3 pt-xs-3 pb-xs-3">
  <div class="container mb-3">
    <div class="row justify-content-center">
      <img class="img-fluid pt-lg-5 pt-md-3 pt-sm-3 pt-xs-3 animated fadeIn" src="{{ asset('img/sm-logo-blue.png') }}"></img>
    </div>
    <div class="row mx-auto justify-content-center animated fadeInUp">
        <div class="col-lg-6 col-md-10 col-sm-8">
            <br>
            <form method="POST" action="{{ route('login') }}">
              @csrf
                <div class="form-group row">
                  <label for="email" class="col-sm-4 col-form-label text-md-right" style="color:white;text-shadow:2px 4px 5px black;">{{ __('E-Mail Address') }}</label>
                  <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right" style="color:white;text-shadow:2px 4px 5px black;">{{ __('Password') }}</label>
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
                    <div class="col-md-6 offset-md-4">
                        <div class="checkbox">
                          <label style="color:white">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                          </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary" style="text-shadow:2px 4px 5px black;">
                          {{ __('Login') }}
                        </button>
                        <a class="btn btn-link" style="color:white;text-shadow:2px 4px 5px black;" href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                        </a>
                      </div>
                  </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection

@section('footer')
  @include('partials.footer')
@endsection
