<div class="row">
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card shadow-sm">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stats-icon purple">
                            <i class="bi-emoji-sunglasses-fill pt-2 mt-1"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Administrator</h6>
                        <h6 class="font-extrabold mb-0">{{ $users->where('level', '=', 'Admin')->count() }}</h6>
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
                            <i class="bi-person-check-fill pt-2 mt-1"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Employee</h6>
                        <h6 class="font-extrabold mb-0">{{ $users->where('level', '=', 'Employee')->count() }}</h6>
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
                        <i class="bi-person pt-2 mt-1"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Users Public</h6>
                        <h6 class="font-extrabold mb-0">{{ $users->where('level', '=', 'Public')->count() }}</h6>
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
                        <i class="bi-people-fill pt-2 mt-1"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Total Users</h6>
                        <h6 class="font-extrabold mb-0">{{ $users->count() }}</h6>                                                
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
                    <h4 class="card-title mb-0"><i class="fas fa-users me-2"></i> Table Semua User</h4>
                </div>
                <div class="card-content">
                    <!-- table contextual / colored -->
                    <div style="overflow: scroll" class="table-responsive m-3 mt-0">
                        <table style="overflow: scroll" class="table table-responsive table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Level</th>
                                    <th>Verification</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $u)

                                    @if ($u->level == "Admin")
                                        <tr>
                                            <td class="table-dark">{{ $u->id }}</td>
                                            <td class="table-dark">{{ $u->name }}</td>
                                            <td class="table-dark">{{ $u->username }}</td>
                                            <td class="table-dark">{{ $u->email }}</td>
                                            <td class="table-dark">{{ $u->phone }}</td>
                                            <td class="table-dark">{{ $u->level }}</td>
                                            <td class="table-dark">
                                                @if ($u->email_verified_at == true)
                                                    <strong class="text-success">Verified <i class="fas fa-check"></i></strong>
                                                @endif
                                            </td>
                                            
                                            <td class="table-dark">
                                                <button type="submit" class="btn btn-danger disabled">Delete</button>
                                            </td>
                                        </tr>
                                    @elseif ($u->level == "Employee")
                                        <tr>
                                            <td class="table-secondary">{{ $u->id }}</td>
                                            <td class="table-secondary">{{ $u->name }}</td>
                                            <td class="table-secondary">{{ $u->username }}</td>
                                            <td class="table-secondary">{{ $u->email }}</td>
                                            <td class="table-secondary">{{ $u->phone }}</td>
                                            <td class="table-secondary">{{ $u->level }}</td>
                                            <td class="table-secondary">
                                                @if ($u->email_verified_at == true)
                                                    <strong class="text-success">Verified <i class="fas fa-check"></i></strong>
                                                @endif
                                            </td>
                                            <td class="table-secondary">
                                                @if (auth()->user()->level == "Admin")
                                                    <form action="{{ URL('/delete-user/'.$u->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                @else
                                                    <button type="submit" class="btn btn-danger disabled">Delete</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @elseif ($u->level == "Public")
                                        <tr>
                                            <td class="table-light">{{ $u->id }}</td>
                                            <td class="table-light">{{ $u->username }}</td>
                                            <td class="table-light">{{ $u->username }}</td>
                                            <td class="table-light">{{ $u->email }}</td>
                                            <td class="table-light">{{ $u->phone }}</td>
                                            <td class="table-light">{{ $u->level }}</td>
                                            <td class="table-light">
                                                @if ($u->email_verified_at == true)
                                                    <strong class="text-success">Verified <i class="fas fa-check"></i></strong>
                                                @endif
                                            </td>
                                            <td class="table-light">
                                                @if (auth()->user()->level == "Admin")
                                                    <form action="{{ URL('/delete-user/'.$u->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                @else
                                                    <button type="submit" class="btn btn-danger disabled">Delete</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif

                                @endforeach

                                {{ $users->links() }}

                            </tbody>                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contextual classes end -->