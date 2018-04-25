<nav class="navbar navbar-expand-md navbar-light fixed-top bg-white">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
              @guest
                <li><a class="nav-link" href="{{ route('login') }}"><span class="fa fa-user-circle-o"></span>{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}"><span class="fa fa-sign-in"></span>{{ __('Register') }}</a></li>
              @else
                @if(Auth::user()->HasRole('admin'))
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <span class="fa fa-dashboard"></span>Dashboard <span class="caret"></span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('dashboard_parkingspots') }}">
                      Parking Spot
                    </a>
                    <a class="dropdown-item" href="{{ route('dashboard_reservations') }}">
                      Reservations
                    </a>
                    <a class="dropdown-item" href="{{ route('log_reservations') }}">
                      Log Reservations
                    </a>
                  </div>
                </li>
                @endif
                <li><a class="nav-link" href="{{ route('reservation_home') }}"> <span class="fa fa-book"></span>Reservation </a> </li>
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <span class="fa fa-user"></span>{{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
                </li>
              @endguest
              <li><a class="nav-link" href="{{ route('about') }}"><span class="fa fa-asterisk"></span>{{ __('About') }}</a></li>
            </ul>
        </div>
    </div>
</nav>
