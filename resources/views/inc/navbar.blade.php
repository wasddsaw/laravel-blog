 <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/lsapp/public/">{{config('app.name','LSAPP')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/lsapp/public/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/lsapp/public/about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/lsapp/public/services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/lsapp/public/posts">Blog</a>
            </li>
          </ul>
          <ul class="navbar-nav navbar-right">
            <!--<li class="nav-item">
              <a class="nav-link" href="/lsapp/public/posts/create">Create Post</a>
            </li>-->
            @if (Auth::guest())
            <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
            @else
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ url('/home') }}">Dashboard</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                </div>
            </li>
             @endif
          </ul>
        </div>
      </nav>
</header> 