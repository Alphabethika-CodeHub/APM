<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html">Alphabethika</a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <hr>

                <li class="sidebar-item active ">
                    <a href="{{ URL('/home') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fab fa-stack-exchange"></i>
                        <span>Laporan Pengaduan</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ URL('/home/complaints-detail') }}">Pengaduan Details</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fas fa-user-alt"></i>
                        <span>User</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ URL('/home/users-details') }}">Users Details</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="menu">
              @if (auth()->user()->level == "Admin")
                <hr>
                    <li class="sidebar-item">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn"><i class="fas fa-plus-circle me-3"></i><span>New Employee Account</span></button>
                    </li>
                <hr>
              @else
                  
              @endif
              <li class="sidebar-item">
                <form id="logout-formlogout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-warning text-dark" style="width: 240px">Log Out</button>
                </form>
            </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>

@include('layouts.MDB.Admin-Dashboard.Component.Modal-Sidebar-Component')