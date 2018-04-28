@extends('layouts.app')

@section('navbar')
  @include('backend.partials.nav')
@endsection

@section('content')
<div class="container">
    <div class="row pt-5 justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12">
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
            <div class="card">
                <div class="card-header">
                  <h5><b>Member</b></h5>
                  <form action="{{ route('member_create') }}" method="GET">
                    <button type="submit" class="btn btn-xs btn-primary">
                      <span class="ion ion-ios-person"></span> Add New Member
                    </button>
                  </form>
                </div>
                <div class="card-body">
                  <table class ="table table-responsive">
                    <tr>
                      <td class="col-lg-1 col-sm-1"><b> id </b></td>
                      <td class="col-lg-2 col-sm-1"><b> Username </b></td>
                      <td class="col-lg-2 col-sm-1"><b> Email </b></td>
                      <td class="col-lg-2 col-sm-1"><b> Created at </b></td>
                      <td class="col-lg-2 col-sm-1"><b> Updated at </b></td>
                      <td class="col-lg-2 col-sm-1"><b> Action </b></td>
                    </tr>
                    <tbody>
                      @foreach ($members as $member)
                        <tr>
                          <td class="col-lg-1 col-sm-1"> {{$member['id']}} </td>
                          <td class="col-lg-2 col-sm-1"> {{$member['name']}} </td>
                          <td class="col-lg-2 col-sm-1"> {{$member['email']}} </td>
                          <td class="col-lg-2 col-sm-1"> {{$member['created_at']}} </td>
                          <td class="col-lg-2 col-sm-1"> {{$member['updated_at']}} </td>
                          <td>
                            <form action="{{ route('member_delete', $member) }}" method="POST">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-xs btn-danger">
                                <span class="fa fa-trash"></span><b></b>
                              </button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="row justify-content-end"> {{ $members->links() }} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
