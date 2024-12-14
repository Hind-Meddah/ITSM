  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Navbar Search -->
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> --}}
            <!-- Notifications Dropdown Menu -->
            @if (Auth::check() && Auth::user()->Role !== "ADMIN")

            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                @if(auth()->user()->unreadNotifications->count() > 0)
                <span class="badge badge-danger navbar-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
              @endif
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-item dropdown-header">
                  <a href="{{ route('mark-notifications-as-read') }}" class="">mark all as read</a></div>
                  @foreach(auth()->user()->notifications->take(5) as $notification)
                  <a href="#" class="dropdown-item">
                    <div class="media">
                      <div class="media-body">
                        <p class="text-sm">{{ $notification->data['Message'] }}</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $notification->created_at->diffForHumans() }}</p>
                      </div>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                @endforeach
                {{-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> --}}
              </div>
            </li>
            @endif
             <!-- Profile Dropdown Menu -->
             <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-user"></i>
                  
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                 
                  <div class="dropdown-divider"></div>
                  <a href="/profile" class="dropdown-item">
                      <i class="fas fa-user mr-2"></i> Profile
                  </a>
    
                  <div class="dropdown-divider"></div>
                  
                      <form method="POST" action="{{ route('logout') }}" >
                        @csrf
                        <a href="{{ route('logout') }}" class="dropdown-item"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">   
                            <i class="fas fa-sign-out-alt mr-2"></i>                  
                               {{ __('Log Out') }}
                        </a>
                    </form>
                  
             
              </div>
          </li>
    </ul>
  </nav>
  <!-- /.navbar -->
