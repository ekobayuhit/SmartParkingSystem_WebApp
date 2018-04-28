<header id="navbar">
  <div class="container">
    <div id="logo" class="pull-left">
        <h1><a href="/">Smart Parking System</a></h1>
    </div>
    <nav id="nav-menu-container">
      <ul class="nav-menu">
        @guest
          <li><a href="{{ route('login') }}"><span class="fa fa-user-circle-o"></span> {{ __('Login') }}</a></li>
          <li><a href="{{ route('register') }}"><span class="fa fa-sign-in"></span> {{ __('Register') }}</a></li>
        @else
          @if(Auth::user()->HasRole('admin'))
            <li class="menu-has-children"><a href="#"><span class="ion ion-ios-monitor-outline"></span> Dashboard</a>
              <ul>
                <li><a href="{{ route('dashboard') }}">
                  Monitor
                </a></li>
                <li><a href="{{ route('parkingspot_index') }}">
                  Parking Spot
                </a></li>
                <li><a href="{{ route('dashboard_reservations') }}">
                  Reservations
                </a></li>
                <li><a href="{{ route('log_reservations') }}">
                  Log Reservations
                </a></li>
                <li><a href="{{ route('member_index') }}">
                  Members
                </a></li>
              </ul>
            </li>
          @endif
          <li><a href="{{ route('reservation_home') }}"> <span class="ion ion-ios-book-outline"></span> Reservation </a> </li>
          <li class="menu-has-children"><a href="#"><span class="ion ion-ios-person-outline"></span> {{ Auth::user()->name }}</a>
            <ul>
              <li>
                <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
            </ul>
          </li>
        @endguest
        <li><a href="{{ route('about') }}"><span class="ion ion-ios-information-outline"></span> {{ __('About') }}</a></li>
        <li id="nav-footer" class="text-white">
          <a href="http://soedirmanmoeda.herokuapp.com"><small>Soedirman Moeda Project {{ date('Y') }} </small></a>
          </li>
      </ul>
    </nav>
  </div>
</header>
