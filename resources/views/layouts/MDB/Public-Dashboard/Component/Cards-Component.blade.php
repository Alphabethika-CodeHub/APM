{{-- Cards Group --}}
    <div class="row" id="cards">
        @foreach ($complaints as $c)
            <div class="col-md-4 mt-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($c->title, 30, '...') }}</h5>
                        <p class="card-text">{{ Str::limit($c->subject, 85, '...') }}</p>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-primary mt-2" href="{{ URL('/detail/'.$c->id) }}">Detail</a>
                            <p class="card-text text-end"><small class="text-muted">Created at {{ $c->created_at->diffForHumans() }}</small>
                                <br>
                                
                                @if ($c->status == "Process")
                                    <span class="badge bg-dark rounded-pill"><span class="spinner-grow spinner-grow-sm" role="status"></span> {{ $c->status }}</span>
                                @elseif ($c->status == "Pending")
                                    <span style="background-color: orange" class="badge rounded-pill"><i class="fas fa-times"></i> {{ $c->status }}</span>
                                @elseif ($c->status == "Completed")
                                    <span class="badge bg-success rounded-pill"><i class="fas fa-check"></i> {{ $c->status }}</span>
                                @endif

                            </p>
                        </div>
                    </div>

                    <img style="max-height: 200px; object-fit: cover;" src="{{ $c->takeImage() }}" class="card-img-bottom img-fluid" alt="...">
                    {{-- <img style="max-height: 200px; object-fit: cover;" src="{{ asset('/images/samples/'.$c->image) }}" class="card-img-bottom img-fluid" alt="..."> --}}

                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $complaints->links() }}
    </div>
{{-- Cards Group --}}