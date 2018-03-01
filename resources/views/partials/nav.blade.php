<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3" >
  <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">G A M I N G </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
            @guest
            <li class="nav-item">
              <a class="nav-link" href="/posts">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about">About</a>
            </li>
            @else
            @if( Auth::user()->user_role == 1 && Auth::user()->user_status == 1)
            <li class="nav-item">
              <a class="nav-link" href="/dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/posts">All Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/user-list">Users List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about">About</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="/posts">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about">About</a>
            </li>
            @endif
            @endguest
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item"><a class="nav-link" href="/posts/create">Create Post</a></li>
                  <li><a class="nav-link" data-toggle="modal" data-target="#login">Login</a></li>
                  <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
              @else
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a href="/profile" class="dropdown-item">Your Profile</a>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              Logout
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>
      </div>
  </div >
</nav>