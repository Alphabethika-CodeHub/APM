<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <ul class="nav me-auto">
            <li class="nav-item">
                <a class="nav-link active fw-bold" aria-current="page" href="{{ URL('/home') }}">APM</a>
            </li>
            
            @if (auth()->user()->level == "Public")
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL('/pengaduan-lengkap') }}">Pengaduan Saya</a>
                </li>
            @elseif (auth()->user()->level == "Admin")
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL('/home') }}">Dashboard</a>
                </li>
            @endif

        </ul>
    
        <ul class="nav">
            <li class="nav-link">
                <form id="logout-formlogout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn text-dark">Log Out</button>
                </form>
            </li>
        </ul>
    </div>
</nav>