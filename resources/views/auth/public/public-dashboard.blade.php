@extends('layouts.MDB.MDB5-V2')

@section('title', 'Public - Dashboard')

@section('content')

@include('layouts.MDB.Public-Dashboard.Nav')

<div class="container">
    
    <div class="masyarakat">
        <h1 class="text-center mt-5">Layanan Aspirasi dan Pengaduan Online Rakyat</h1>
        <h4 class="text-center">Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</h4>        

        <hr class="my-5">

        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check"></i> <strong>Berhasil! - </strong> Laporan Anda Sudah Tersimpan.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($message = Session::get('deleted'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check"></i> <strong>Berhasil! - </strong> Laporan Anda Sudah Terhapus.
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
        </div>

        {{-- Form Lapor --}}
        <div class="row justify-content-center" id="form-lapor">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="{{ URL('/store') }}" enctype="multipart/form-data">

                                @csrf

                                <div class="form-body">
                                    <div class="row">
        
                                        <h3 class="text-center">Form Laporan</h3>
        
                                        <hr class="mt-2 mb-4">
        
                                        <p class="text-center">Isi Laporan Anda Dengan Lengkap Dan Benar</p>
        
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="username">Username</label>
                                                <div class="position-relative">
                                                    <input type="text" name="username" class="form-control" placeholder="{{ auth()->user()->username }}" id="username" disabled>
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
                                                    <input type="email" name="email" class="form-control" placeholder="{{ auth()->user()->email }}" id="email" disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-envelope"></i>
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

    </div>

</div>

<footer class="page-footer font-small" style="background-color: #262626">
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a class="text-light" href="https://mdbootstrap.com/"> Daffa Nabil H</a>
    </div>
</footer>

@endsection