@extends('layouts.MDB.MDB5')

@section('title', 'APM - About')

@section('content')

@include('layouts.MDB.NavFooter.Nav')

    <div class="container">
        <div class="jumbotron mt-5">
            <h1 class="display-5 text-center">Tentang - Pengaduan Masyarakat</h1>
            <hr class="my-4 black">
            <p class="lead">Apps Ini dibentuk untuk merealisasikan kebijakan “no wrong door policy” yang menjamin hak masyarakat agar pengaduan dari manapun dan jenis apapun akan disalurkan kepada penyelenggara pelayanan publik yang berwenang menanganinya - ( Diperuntukkan Untuk Ujikom )</p>
            <hr class="my-4 black">
            <ul>
                <li class="list-group-item">Version Apps : <strong>0.1 Beta</strong></li>
                <li class="list-group-item">Framework : <strong>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</strong></li>
                <li class="list-group-item">Tahun Pengembangan : <strong>Maret 2021</strong></li>
                <li class="list-group-item">Nama : <strong>Daffa Nabil Hartono</strong></li>
                <li class="list-group-item">Kelas : <strong>12 RPL 1</strong></li>
            </ul>
            <hr class="my-4">
        </div>
    </div>

@include('layouts.MDB.NavFooter.Footer')
@endsection