@extends('layouts.MDB.MDB5-V2')

@section('title', 'APM')

@section('style')
    <style>
        @media screen and (max-width: 540px) {
            .mobile-hidden {
                display: none;
            }
        }
    </style>

    <style>
        @media screen and (min-width: 1280px) {
            .desktop-hidden {
                display: none;
            }
        }
    </style>
@endsection

@section('content')

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <ul class="nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active fw-bold" aria-current="page" href="#">APM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL('/about') }}">About</a>
                </li>
            </ul>
        
            <ul class="nav">
                <li class="nav-link">
                    <a class="nav-link" href="{{ ROUTE('login') }}">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">

        <h3 class="mt-4 text-center">Aplikasi Pengaduan Masyarakat</h1>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check"></i> <strong>Berhasil! - </strong> Laporan Anda Sudah Tersimpan.
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
        
        <hr class="my-4">

        <div class="row">
            <div class="col-md-6">
                <h5><i class="fas fa-circle-notch me-1"></i><i class="fas fa-ellipsis-h me-1"></i>Kami Siap Menerima Laporan Anda.</h5>
                <h3 class="font-weight-bold">Selamat Datang Di Aplikasi Pengaduan Masyarakat</h3>
                <p style="font-size: 21px;">Sarana interaktif masyarakat berbasis media sosial pertama untuk merealisasikan kebijakan “no wrong door policy” yang menjamin hak masyarakat agar pengaduan dari manapun dan jenis apapun akan disalurkan kepada penyelenggara pelayanan publik yang berwenang menanganinya.</p>
                <a href="{{ URL('/policy') }}" class=""><u>Klik untuk ketahui lebih lanjut mengenai "No Wrong Door Policy"</u></a>
                <br>
                <a href="{{ ROUTE('login') }}" class="btn btn-dark text-gray mt-3">Buat Laporan Anda</a>
            </div>
            <div class="col-md-6 mt-3">
                <div class="card shadow" style=" box-shadow: 5px 5px gray;">
                    <img class="p-4 shadow-4 img-fluid" src="{{ asset('images/think.png') }}" alt="">
                </div>
            </div>
        </div>

        <hr class="mt-0 mb-4 desktop-hidden">
        <hr class="my-5 mobile-hidden">

        <h1 class="text-center mt-5">Layanan Aspirasi dan Pengaduan Online Rakyat</h1>
        <h4 class="text-center">Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</h4>        

        <hr class="my-5">

        {{-- Form Lapor --}}
        <div class="row justify-content-center" id="form-lapor">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="{{ URL('/store-anonim') }}" enctype="multipart/form-data">

                                @csrf

                                <div class="form-body">
                                    <div class="row">
        
                                        <h3 class="text-center">Form Laporan</h3>
        
                                        <hr class="mt-2 mb-4">
        
                                        <p class="text-center">Isi Laporan Anda Dengan Lengkap Dan Benar</p>

                                        <hr>

                                        <div class="col-12 mt-2 d-flex">
                                            <div class="form-check me-3">
                                                <input value="A" onclick = "populateData(event)" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Form Default
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input value="B" onclick = "populateData(event)" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Form Anonim
                                                </label>
                                            </div>
                                        </div>

                                        <hr class="mt-3">
        
                                        <div id="anonim">
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="username">Username</label>
                                                    <div class="position-relative">
                                                        <input type="text" name="username" class="form-control" placeholder="Username" id="username" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="email">Alamat Email</label>
                                                    <div class="position-relative">
                                                        <input type="email" name="email" class="form-control" placeholder="Email" id="email" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-envelope"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="title">Judul Laporan</label>
                                                <div class="position-relative">
                                                    <input type="text" name="title" class="form-control" placeholder="Judul Laporan" id="title" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-question-square-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="col-12">
                                            <label for="subject">Ketik Laporan Anda</label>
                                            <div class="form-group with-title mb-3">
                                                <textarea name="subject" class="form-control" rows="3" required></textarea>
                                                <label>Isi Lengkap Laporan Anda</label>
                                            </div>                                           
                                        </div>
        
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="location">Lokasi</label>
                                                <div class="position-relative">
                                                    <input type="text" name="location" class="form-control" placeholder="Lokasi" id="location" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-map-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        
                                        {{-- <div class="col-12 mt-2 mb-1">
                                            <label for="location">Upload Foto</label>
                                            <input name="image" type="file" class="image-preview-filepond" required>
                                        </div> --}}

                                        <div class="col-12 mt-2 mb-1">
                                            <label for="location">Upload Foto</label>
                                            <div class="form-group">
                                                <input class="form-control"  name="image" type="file" class="image-preview-filepond" required>
                                            </div>
                                        </div>
        
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="location">Tanggal Kejadian</label>
                                                <div class="position-relative">
                                                    <input type="date" name="date" class="form-control">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-clock-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end mt-3">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Kirim Laporan</button>
                                        </div>
        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Form Lapor --}}

        <hr>

        {{-- 5 Steps Lapor --}}
        <div class="row justify-content-center mobile-hidden">            
            <div class="col-md-2">
                <div class="text-center">
                    <i class="fas fa-circle text-center text-center mt-3 mb-0" style="color: red"></i>
                    <hr>
                    <i class="fas fa-edit text-center"></i>
                    <p class="text-center">Tulis Laporan</p>
                    <hr>
                    <p class="text-center px-2">Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="text-center">
                    <i class="fas fa-chevron-circle-right text-center text-center mt-3 mb-0"></i>
                    <hr>
                    <i class="fas fa-share-square text-center"></i>
                    <p class="text-center">Proses Verifikasi</p>
                    <hr>
                    <p class="text-center px-2">Dalam 3 hari, laporan Anda akan diverifikasi dan diteruskan kepada instansi berwenang</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="text-center">
                    <i class="fas fa-chevron-circle-right text-center text-center mt-3 mb-0"></i>
                    <hr>
                    <i class="fas fa-comments text-center"></i>
                    <p class="text-center">Proses Tindak Lanjut</p>
                    <hr>
                    <p class="text-center px-2">Dalam 5 hari, instansi akan menindaklanjuti dan membalas laporan Anda</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="text-center">
                    <i class="fas fa-chevron-circle-right text-center text-center mt-3 mb-0"></i>
                    <hr>
                    <i class="fas fa-comment-dots text-center"></i>
                    <p class="text-center">Beri Tanggapan</p>
                    <hr>
                    <p class="text-center px-2">Anda dapat menanggapi kembali balasan yang diberikan oleh instansi dalam waktu 10 hari</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="text-center">
                    <i class="fas fa-check-circle text-center text-center mt-3 mb-0"></i>
                    <hr>
                    <i class="fas fa-thumbs-up text-center"></i>
                    <p class="text-center">Selesai</p>
                    <hr>
                    <p class="text-center px-2">Laporan Anda akan terus ditindaklanjuti hingga terselesaikan</p>
                </div>
            </div>
        </div>
        {{-- 5 Steps Lapor --}}

        <hr class="mb-5 mt-5 mobile-hidden">

        {{-- 3 Cards Lapor --}}
        <div class="row mb-5">
            <div class="col-md-4 mt-0">
                <div class="card shadow" style="min-height: 165px;">
                    <div class="card-body">
                      <h5 class="card-title"> <i class="fas fa-file-alt me-2"></i> Buat Laporan Anda Sekarang</h5>
                      <p class="card-text">
                        Laporan anda akan kami proses tindak lanjuti.
                      </p>                      
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-0">
                <div class="card shadow" style="min-height: 165px;">
                    <div class="card-body">
                      <h5 class="card-title"> <i class="fas fa-lock me-2"></i> Rahasia</h5>
                      <p class="card-text">Seluruh isi laporan anda terjaga kerahasiaannya dari publik, begitu pula dengan identitas anda.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-0">
                <div class="card shadow" >
                    <div class="card-body" style="min-height: 165px;">
                      <h5 class="card-title"> <i class="fas fa-user-secret me-2"></i>Anonim</h5>
                      <p class="card-text">
                        Fitur yang bisa dipilih oleh pelapor yang akan membuat identitas pelapor tidak akan diketahui oleh pihak terlapor dan masyarakat umum.
                      </p>                      
                    </div>
                </div>
            </div>
        </div>
        {{-- 3 Cards Lapor --}}

    </div>

    @include('layouts.MDB.NavFooter.Footer')
    
@endsection