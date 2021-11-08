@extends('layouts.MDB.MDB5-V2')

@section('title', 'APM - Details')

@section('content')

@include('layouts.MDB.Public-Dashboard.Nav')

<div class="container">

    <a href="{{ URL('/pengaduan-lengkap') }}"><i class="fas fa-arrow-left me-2 mt-4"></i>Kembali</a>
  
    <div class="row justify-content-between">
        <div class="col-md-8 mt-4">
            <div class="card shadow">
                <div class="card-header py-0 mt-3">
                    <div class="d-flex justify-content-between">
                        <h4><strong>{{ $complaint->title }}</strong></h4>
                        <span>
                            @if ($complaint->status == "Process")
                                <span class="badge bg-dark rounded-pill ms-3"><span class="spinner-grow spinner-grow-sm" role="status"></span> {{ $complaint->status }}</span>
                            @elseif ($complaint->status == "Pending")
                                <span style="background-color: orange" class="badge rounded-pill"><i class="fas fa-times"></i> {{ $complaint->status }}</span>
                            @elseif ($complaint->status == "Completed")
                                <span class="badge bg-success rounded-pill"><i class="fas fa-check"></i> {{ $complaint->status }}</span>
                            @endif
                        </span>
                    </div>
                </div>
                <hr class="mb-0">
                <div class="card-header">
                    <h4>Lokasi: {{ $complaint->location }}</h4>
                </div>
                <div class="card-body">
        
                    <div class="text-center">
                        <a href="{{ asset($complaint->takeImage()) }}"><img class="img-fluid p-5" src="{{ asset($complaint->takeImage()) }}" alt=""></a>
                        {{-- <img src="{{ asset('/images/samples/'.$complaint->image) }}" class="card-img-bottom img-fluid" alt="..."> --}}
                    </div>
                    <br>
                    
                    <p>{{ $complaint->subject }}</p>
        
                </div>
        
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <span><strong>Created at: {{ $complaint->created_at->diffForHumans() }}</strong></span>
                        
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Delete
                        </button>                        
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-4">

            @if (auth()->user()->level == 'Admin' && $complaint->status == "Process")
                <div class="card shadow">
                    <div class="card-header mb-0">
                        <h4 class="mb-0">Form Tanggapan</h4>

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
                    <div class="card-body mt-0">
                        <form class="form form-vertical" method="POST" action="{{ URL('/create-response/'.$complaint->id) }}" enctype="multipart/form-data">

                            @csrf

                            <div class="row">

                                <div class="col-12">
                                    <label for="response">Ketik Tanggapan</label>
                                    <div class="form-group with-title mb-3">
                                        <textarea name="response" class="form-control" rows="1" required></textarea>
                                        <label>Isi Lengkap Laporan Anda</label>
                                    </div>                                           
                                </div>

                                <div class="col-12 mt-1 mb-1">
                                    <label for="image">Upload Foto</label>
                                    <div class="form-group">
                                        <input class="form-control" name="image" type="file" id="image">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="date_response">Tanggal Di Tanggapi</label>
                                        <div class="position-relative">
                                            <input type="date" name="date_response" class="form-control" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-clock-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end mt-3">
                                    @if ($complaint->status == "Process")
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Kirim Tanggapan</button>
                                    @elseif ($complaint->status == "Completed")
                                        <button type="submit" class="disabled btn btn-primary me-1 mb-1">Kirim Tanggapan</button>
                                    @endif
                                </div>

                            </div>                        
                        </form>
                    </div>
                </div>
            @endif            

            @if ($complaint->status == "Process")
                
            @elseif ($complaint->status == "Pending")

                <div class="card shadow">
                    <div class="card-header">
                        <h4>Hasil Tanggapan</h4>
                    </div>
                    <div class="card-body">                    
                        <p>{{ $response->response }}</p>
                        <a href="{{ asset($response->takeImage()) }}"><img class="img-fluid p-5" src="{{ asset($response->takeImage()) }}" alt=""></a>
                    </div>
                    <div class="card-footer">
                        <div class="">
                            @if (auth()->user()->level == "Admin" || auth()->user()->level == "Employee")
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
                                    Edit Response
                                </button>
                            @endif
                            <strong class="mt-2 ms-5">Created at: {{ $response->date_response }}</strong>
                        </div>
                    </div>
                </div>

            @elseif ($complaint->status == "Completed")
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Hasil Tanggapan</h4>
                    </div>
                    <div class="card-body">                    
                        <p>{{ $response->response }}</p>
                        <a href="{{ asset($response->takeImage()) }}"><img class="img-fluid p-5" src="{{ asset($response->takeImage()) }}" alt=""></a>
                    </div>
                    <div class="card-footer">
                        <div class="">
                            @if (auth()->user()->level == "Admin" || auth()->user()->level == "Employee")
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
                                    Edit Response
                                </button>
                            @endif
                            <strong class="mt-2 ms-5">Created at: {{ $response->date_response }}</strong>
                        </div>
                    </div>
                </div>
            @endif
            
        </div>        

    </div>

    

    @if (auth()->user()->level == "Admin" && $complaint->status == "Completed")
    
        <div class="modal fade" id="modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        Edit Response
                    </div>
                    <div class="card">
                        <div class="card-header mb-0">
                            <form action="{{ URL('/update-status/'.$complaint->id) }}" method="POST">
                                @csrf
                                @method('patch')
                                {{-- Radio --}}
                                <div class="row justify-content-start">
                                    <div class="col-md-3">
                                        <button class="btn btn-warning" type="submit">Change</button>
                                    </div>
                                    @if ($complaint->status == "Completed")
                                        <div class="col-md-3 mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" value="pending" type="radio" name="status" id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                Pending
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" value="completed" type="radio" name="status" id="flexRadioDefault2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                Completed
                                                </label>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-3 mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" value="pending" type="radio" name="status" id="flexRadioDefault1" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                Pending
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" value="completed" type="radio" name="status" id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                Completed
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </form>
                            <hr>
                            <h4 class="mb-0">Form Tanggapan</h4>
                        </div>
                        <div class="card-body mt-0">
                            <form class="form form-vertical" method="POST" action="{{ URL('/update-response/'.$response->id) }}" enctype="multipart/form-data">

                                @csrf
                                @method('patch')

                                <div class="row">

                                    <div class="col-12">
                                        <label for="response">Ketik Tanggapan</label>
                                        <div class="form-group with-title mb-3">
                                            <textarea name="response" class="form-control" rows="1" required>{{ $response->response }}</textarea>
                                            <label>Isi Lengkap Laporan Anda</label>
                                        </div>                                           
                                    </div>

                                    <div class="col-12 mt-1 mb-1">
                                        <label for="location">Upload Foto</label>
                                        <div class="form-group">
                                            <input class="form-control"  name="image" type="file">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="date_response">Tanggal Di Tanggapi</label>
                                            <div class="position-relative">
                                                <input type="date" value="{{ $response->date_response }}" name="date_response" class="form-control">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-clock-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">                                
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batalkan</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>

                                </div>                        
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    @elseif (auth()->user()->level == "Admin" && $complaint->status == "Pending")

        <div class="modal fade" id="modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        Edit Response
                    </div>
                    <div class="card">
                        <div class="card-header mb-0">
                            <form action="{{ URL('/update-status/'.$complaint->id) }}" method="POST">
                                @csrf
                                @method('patch')
                                {{-- Radio --}}
                                <div class="row justify-content-start">
                                    <div class="col-md-3">
                                        <button class="btn btn-warning" type="submit">Change</button>
                                    </div>
                                    @if ($complaint->status == "Completed")
                                        <div class="col-md-3 mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" value="pending" type="radio" name="status" id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                Pending
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" value="completed" type="radio" name="status" id="flexRadioDefault2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                Completed
                                                </label>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-3 mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" value="pending" type="radio" name="status" id="flexRadioDefault1" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                Pending
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" value="completed" type="radio" name="status" id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                Completed
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </form>
                            <hr>
                            <h4 class="mb-0">Form Tanggapan</h4>
                        </div>
                        <div class="card-body mt-0">
                            <form class="form form-vertical" method="POST" action="{{ URL('/update-response/'.$response->id) }}" enctype="multipart/form-data">

                                @csrf
                                @method('patch')

                                <div class="row">

                                    <div class="col-12">
                                        <label for="response">Ketik Tanggapan</label>
                                        <div class="form-group with-title mb-3">
                                            <textarea name="response" class="form-control" rows="1" required>{{ $response->response }}</textarea>
                                            <label>Isi Lengkap Laporan Anda</label>
                                        </div>                                           
                                    </div>

                                    <div class="col-12 mt-1 mb-1">
                                        <label for="location">Upload Foto</label>
                                        <div class="form-group">
                                            <input class="form-control"  name="image" type="file">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="date_response">Tanggal Di Tanggapi</label>
                                            <div class="position-relative">
                                                <input type="date" value="{{ $response->date_response }}" name="date_response" class="form-control">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-clock-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                

                                    <div class="modal-footer">                                
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>

                                </div>                        
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @elseif (auth()->user()->level == "Admin" && $complaint->status == "Process")

    @endif

    <!-- Modal -->
    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Laporan | 
                        @if ($complaint->status == "Process")
                            <span class="badge bg-dark rounded-pill"><span class="spinner-grow spinner-grow-sm" role="status"></span> {{ $complaint->status }}</span>
                        @elseif ($complaint->status == "Pending")
                            <span style="background-color: orange" class="badge rounded-pill"><i class="fas fa-times"></i> {{ $complaint->status }}</span>
                        @elseif ($complaint->status == "Completed")
                            <span class="badge bg-success rounded-pill"><i class="fas fa-check"></i> {{ $complaint->status }}</span>
                        @endif    
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <h5>Anda Yakin Ingin Menghapus Laporan Ini?</h5>
                <div class="row">
                    <span>Judul Laporan: {{ Str::limit($complaint->title, 25, '...') }}</span>
                    <span>Dibuat Pada: {{ $complaint->date }}</span>
                </div>
            </div>
                <div class="modal-footer">
                    <form action="{{ URL('/delete/'.$complaint->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
    
@endsection
