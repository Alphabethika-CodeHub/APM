@extends('layouts.MDB.MDB5-V2')

@section('title', 'Pengaduan Saya')

@section('content')

@include('layouts.MDB.Public-Dashboard.Nav')

<div class="container">
    <div class="row justify-content-between mt-5">
        <div class="col-md-3">
            <a href="{{ URL('/home') }}"><i class="fas fa-arrow-left"> Kembali</i></a>
            <hr>
            <p>Pengaduan Saya</p>
        </div>
        <div class="col-md-2">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input onclick = "populateData(event)" value="cards" type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                <label class="btn btn-outline-primary" for="btnradio1">Cards</label>                
              
                <input onclick = "populateData(event)" value="list" type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio3">List</label>
            </div>
        </div>
    </div>

    <div id="content_c">
        @include('layouts.MDB.Public-Dashboard.Component.Cards-Component')
    </div>

</div>
    
@endsection

@section('script')
    <script>
        var targetDiv = document.getElementById('content_c');
        var htmlContent = '';

        function populateData(event){
        switch(event.target.value){
            case 'cards':{
                htmlContent = `@include('layouts.MDB.Public-Dashboard.Component.Cards-Component')`;
                break;
            }
            case 'list':{
                htmlContent = `@include('layouts.MDB.Public-Dashboard.Component.List-Component')`;
                break;
            }
        }
            targetDiv.innerHTML = htmlContent;
        }
    </script>
@endsection