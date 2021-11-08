@extends('layouts.MDB.MDB-Admin-Dashboard')

@section('title', 'APM - Dashboard')

@section('content')

    <div id="app">
            
        @include('layouts.MDB.Admin-Dashboard.Component.Sidebar-Component')

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Profile Statistics</h3>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check"></i> <strong>Berhasil! - </strong> Employee Sudah Tersimpan.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($message = Session::get('success_response'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check"></i> <strong>Berhasil! - </strong> Tanggapan Anda Sudah Terpublikasi.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($message = Session::get('success_response_update'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check"></i> <strong>Berhasil! - </strong> Tanggapan Anda Sudah Di Perbarui.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($message = Session::get('success_user_delete'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check"></i> <strong>Berhasil! - </strong> Pengguna Berhasil Di Hapus.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($message = Session::get('success_status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check"></i> <strong>Berhasil! - </strong> Status Pengaduan Berhasil Diubah.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading"><strong>Whoops!</strong> There were some problems with your input.</h4>                    
                        <hr>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card shadow-sm">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Laporan Process</h6>
                                                <h6 class="font-extrabold mb-0">{{ $complaints->where('status', '=', 'Process')->count() }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card shadow-sm">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="bi-exclamation-square-fill pt-2 mt-1"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Laporan Pending</h6>
                                                <h6 class="font-extrabold mb-0">{{ $complaints->where('status', '=', 'Pending')->count() }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card shadow-sm">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                <i class="bi-check-circle-fill pt-2 mt-1"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Laporan Selesai</h6>
                                                <h6 class="font-extrabold mb-0">{{ $complaints->where('status', '=', 'Completed')->count() }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card shadow-sm">
                                    <div class="card-body px-3 py-4-5 mb-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                <i class="bi-hdd-stack-fill pt-2 mt-1"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Total Laporan</h6>
                                                <h6 class="font-extrabold mb-0">{{ $complaints->count() }}</h6>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card shadow-sm">
                                    <div class="card-header">
                                        <h4><i class="fas fa-calendar-alt me-2"></i> Statistik Total Pengaduan Berdasarkan Bulan</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-profile-visit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card shadow-sm">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center my-2">
                                    <div class="avatar avatar-xl">
                                        @if (auth()->user()->level == "Admin")
                                            <img src="{{ asset('images/faces/astro.png') }}" alt="Face 1">
                                        @elseif (auth()->user()->level == "Employee")
                                            <img src="{{ auth()->user()->takeImage() }}" alt="Face 1">
                                        @endif
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">{{ auth()->user()->name }}</h5>
                                        <h6 class="text-muted mb-0">@ {{ auth()->user()->username }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h4><i class="fas fa-chart-line me-3"></i> Statistik Pengaduan</h4>
                            </div>
                            <div class="card-body" style="min-height: 345px">
                                <div id="chart-visitors-profile"></div>
                            </div>
                        </div>
                    </div>

                    {{-- Table --}}
                    @include('layouts.MDB.Admin-Dashboard.Component.Table-Component')

                    @include('layouts.MDB.Admin-Dashboard.Component.Table-User-Component')

                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Alphabethika</p>
                    </div>
                    <div class="float-end">
                        <p><i class="fab fa-instagram"></i> Instagram: <a href="https://www.instagram.com/daffanh_6633/">Daffa Nabil H</a></p>
                    </div>
                </div>
            </footer>
        </div>

    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/fc-3.3.2/r-2.2.7/datatables.min.js"></script>

    <script src="{{ URL::asset('vendors/apexcharts/apexcharts.js') }}"></script>

    @include('layouts.MDB.Admin-Dashboard.Component.Script')
@endsection