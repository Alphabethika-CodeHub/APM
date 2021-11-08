@extends('layouts.MDB.MDB-Admin-Dashboard')

@section('title', 'Complaints Detail')

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

            <h4>Detail Pengaduan Masyarakat</h4>
            <hr>
            <p class="text-red ">*Data Kartu Berdasarkan Total Data Pada Tabel Pengaduan Dibawah.</p>

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
                        <div class="card-body px-3 py-4-5">
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

            <!-- Contextual classes start -->
            <section class="section">
                <div class="row" id="table-contexual">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h4 class="card-title mb-0"><i class="fas fa-border-all me-2"></i> Table Pengaduan</h4>
                            </div>
                            <div class="card-content">
                                <!-- table contextual / colored -->
                                <div style="overflow: scroll" class="table-responsive m-3 mt-0">
                                    <table style="overflow: scroll" class="table table-responsive table-bordered mb-0 yajra-datatable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Username</th>
                                                <th>Pengaduan</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th>Lokasi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($complaints as $c)
                                                @if ($c->status == 'Process')
                                                    <tr class="table-danger">
                                                        <td class="text-bold-500">{{ $c->id }}</td>
                                                        <td class="text-bold-500">{{ $c->username }}</td>
                                                        <td>{{ Str::limit($c->subject, 50, '...') }}</td>                                        
                                                        <td>{{ $c->date->format('d-m-Y') }}</td>
                                                        <td class="fw-bold"><i class="fas fa-circle" style="color: red"></i> {{ $c->status }}</td>
                                                        <td>{{ Str::limit($c->location, 20, '...') }}</td>
                                                        <td><a href="{{ URL('/detail/'.$c->id) }}"><i class="fas fa-paper-plane me-1"></i>Tanggapi</a></td>
                                                    </tr>
                                                @elseif ($c->status == 'Pending')
                                                    <tr class="table-warning">
                                                        <td class="text-bold-500">{{ $c->id }}</td>
                                                        <td class="text-bold-500">{{ $c->username }}</td>
                                                        <td>{{ Str::limit($c->subject, 50, '...') }}</td>                                        
                                                        <td>{{ $c->date->format('d-m-Y') }}</td>
                                                        <td class="fw-bold"><i class="fas fa-circle" style="color: orange"></i> {{ $c->status }}</td>
                                                        <td>{{ Str::limit($c->location, 20, '...') }}</td>
                                                        <td><a href="{{ URL('/detail/'.$c->id) }}"><i class="fas fa-times me-1"></i>Tanggapi</a></td>
                                                    </tr>
                                                @elseif ($c->status == 'Completed')
                                                    <tr class="table-info">
                                                        <td class="text-bold-500">{{ $c->id }}</td>
                                                        <td class="text-bold-500">{{ $c->username }}</td>
                                                        <td>{{ Str::limit($c->subject, 50, '...') }}</td>                                        
                                                        <td>{{ $c->date->format('d-m-Y') }}</td>
                                                        <td class="fw-bold"><i class="fas fa-circle" style="color: green"></i> {{ $c->status }}</td>
                                                        <td>{{ Str::limit($c->location, 20, '...') }}</td>
                                                        <td><a href="{{ URL('/detail/'.$c->id) }}"><i class="fas fa-check me-1"></i>Selesai</a></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            {{ $complaints->links() }}

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Contextual classes end -->

        </div>

    </div>

@endsection