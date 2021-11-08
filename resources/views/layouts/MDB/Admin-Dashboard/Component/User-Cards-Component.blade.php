<div class="row">
    @foreach ($users as $u)
        <div class="col-md-3 pe-3">
            <div class="card shadow">
                {{-- <img src="{{ asset($u->image) }}" class="img-fluid" alt="..."> --}}
                <img src="{{ asset('storage/'.$u->image) }}" class="img-fluid" alt="...">
                
                <div class="card-body">
                    
                    @if ($u->name == '')
                        <h5 class="card-title text-center">{{ $u->username }}</h5>
                    @else
                        <h5 class="card-title text-center">{{ $u->name }}</h5>
                    @endif

                    <hr>

                    @if ($u->email_verified_at == true)
                        <div class="text-center mb-2 text-success">
                            <strong>Verified <i class="fas fa-check"></i></strong>
                        </div>
                    @endif

                    <ul class="list-group shadow-sm">

                        @if ($u->level == "Admin")
                            <li class="list-group-item badge bg-dark">Level: {{ $u->level }}</li>    
                        @elseif ($u->level == "Employee")
                            <li class="list-group-item badge bg-secondary">Level: {{ $u->level }}</li>
                        @elseif ($u->level == "Public")
                            <li class="list-group-item badge bg-light text-dark">Level: {{ $u->level }}</li>
                        @endif

                        <li class="list-group-item">Name: {{ $u->name }}</li>
                        <li class="list-group-item">Username: @ {{ $u->username }}</li>
                        <li class="list-group-item">Email: {{ $u->email }}</li>
                        <li class="list-group-item">Phone: {{ $u->phone }}</li>
                    </ul>
                    
                    @if ($u->level == "Admin")
                        <div class="text-center mt-3">
                            <button type="submit" class="disabled btn btn-danger px-5">Delete</button>
                        </div>
                    @else
                        @if (auth()->user()->level == "Admin")
                            <div class="text-center mt-3">
                                <form action="{{ URL('/delete-user/'.$u->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger px-5">Delete</button>
                                </form>
                            </div>
                        @else
                            <div class="text-center mt-3">
                                <button type="submit" class="disabled btn btn-danger px-5">Delete</button>
                            </div>
                        @endif    
                    @endif
                                                
                </div>
            </div>
        </div>
    @endforeach
</div>