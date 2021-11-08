<div class="row justify-content-center mt-3 mb-3">
    <div class="col-md-12">
        <div class="list-group shadow">
            @foreach ($users as $u)
                <a class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        @if ($u->level == "Admin")
                            <h5 class="mb-1 text-danger"><i class="fas fa-user me-3"></i> {{ $u->level }} | Name: {{ $u->name }}</h5>
                            <button type="submit" class="btn btn-danger disabled">Delete Permanently</button>
                        @elseif ($u->level == "Employee")
                            <h5 class="mb-1 text-secondary"><i class="fas fa-user me-3"></i> {{ $u->level }} | Name: {{ $u->name }}</h5>
                            @if (auth()->user()->level == "Admin")
                                <form action="{{ URL('/delete-user/'.$u->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete Permanently</button>
                                </form>
                            @else
                                <button type="submit" class="btn btn-danger disabled">Delete Permanently</button>
                            @endif
                        @elseif ($u->level == "Public")
                            <h5 class="mb-1"><i class="fas fa-user me-3"></i> {{ $u->level }} | Name: {{ $u->name }}</h5>
                            @if (auth()->user()->level == "Admin")
                                <form action="{{ URL('/delete-user/'.$u->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete Permanently</button>
                                </form>
                            @else
                                <button type="submit" class="btn btn-danger disabled">Delete Permanently</button>
                            @endif
                        @endif
                    </div>
                </a>                
            @endforeach
        </div>
    </div>
</div>

<div class="d-flex justify-content-center">
    {{ $users->links() }}
</div>