<header>
    <nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: #F2F7FF">
      <div class="container-fluid">
        <div class="navbar-brand">APM</div>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarExample01">

          <ul class="navbar-nav mb-2 mt-1 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="{{ URL('/') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ URL('/about') }}">About</a>
            </li>
          </ul>

          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="{{ URL('/login') }}">Login</a>
            </li>            
          </ul>

        </div>
      </div>
    </nav>
</header>