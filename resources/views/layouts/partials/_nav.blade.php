<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand text-uppercase" href="{{ route('contacts.index') }}">            
          <strong>{{ config('app.name') }}</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
          
      <!-- /.navbar-header -->
      <div class="collapse navbar-collapse" id="navbar-toggler">
          @auth
            <ul class="navbar-nav">
              <li class="nav-item {{ request()->segment(1) == 'companies' ? 'active' : '' }}"><a href="{{ route('companies.index') }}" class="nav-link">Companies</a></li>
              <li class="nav-item {{ request()->segment(1) == 'contacts' ? 'active' : '' }}"><a href="{{ route('contacts.index') }}" class="nav-link">Contacts</a></li>
            </ul>
          @endauth
        <ul class="navbar-nav ml-auto">
          @guest
            <li class="nav-item mr-2"><a href="{{ route('login') }}" class="btn btn-outline-secondary">Login</a></li>
            <li class="nav-item"><a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a></li>
          @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ auth()->user()->name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" style="display:none">
                  {{-- @method('POST') --}}
                  @csrf
                </form>
              </div>
            </li>
          @endguest 

        </ul>
      </div>
    </div>
  </nav>