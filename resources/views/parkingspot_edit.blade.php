@extends('layouts.app')

@section('navbar')
  @include('backend.partials.nav')
@endsection

@section('content')
<div class="container">
    <div class="row pt-5">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="card">
            <div class="card-body">
              <form method="POST" action="{{ route('parkingspot_update', $parkingspot) }}">
                @csrf
                @method('put')
                <div class="form-group row">
                  <label for="spotname" class="col-lg-4 col-md-4 col-form-label text-md-right">{{ __('Spot Name') }}</label>
                  <div class="col-lg-6 col-md-6">
                    <input type="text" class="form-control{{ $errors->has('spotname') ? ' is-invalid' : '' }}" name="spotname" value="{{ $parkingspot['spot'] }}" required autofocus>
                    @if ($errors->has('spotname'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('spotname') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary" style="text-shadow:2px 4px 5px black;">
                      {{ __('Save') }}
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
