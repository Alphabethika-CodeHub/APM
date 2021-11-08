@extends('layouts.MDB.MDB-Admin-Dashboard')

@section('title', 'Users Detail')

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

            @if ($message = Session::get('success_user_delete'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check"></i> <strong>Berhasil! - </strong> Pengguna Berhasil Di Hapus.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row justify-content-between mt-3 mb-3">
                <div class="col-md-3">
                    <a href="{{ URL('/home') }}"><i class="fas fa-arrow-left"> Kembali</i></a>
                    <hr>
                    
                    <p>Detail Seluruh Pengguna</p>
                </div>
                <div class="col-md-2">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input onclick = "populateData(event)" value="cards" type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                        <label class="btn btn-outline-primary" for="btnradio1"><i class="fas fa-address-card"></i> Cards</label>
                      
                        <input onclick = "populateData(event)" value="lists" type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio2"><i class="fas fa-th-list"></i> List</label>

                        <input onclick = "populateData(event)" value="tables" type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio3"><i class="fas fa-table"></i> Table</label>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    @if ($message = Session::get('deleted'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check"></i> <strong>Berhasil! - </strong> User Sudah Terhapus.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>

            <div id="content_u">
                @include('layouts.MDB.Admin-Dashboard.Component.User-Cards-Component')
            </div>
            
        </div>

    </div>

@endsection

@section('script')
<script>
    var targetDiv = document.getElementById('content_u');
    var htmlContent = '';

    function populateData(event){
    switch(event.target.value){
        case 'cards':{
            htmlContent = `@include('layouts.MDB.Admin-Dashboard.Component.User-Cards-Component')`;
            break;
        }
        case 'lists':{
            htmlContent = `@include('layouts.MDB.Admin-Dashboard.Component.User-Lists-Component')`;
            break;
        }
        case 'tables':{
            htmlContent = `@include('layouts.MDB.Admin-Dashboard.Component.User-Tables-Component')`;
            break;
        }
    }
        targetDiv.innerHTML = htmlContent;
    }
</script>
@endsection