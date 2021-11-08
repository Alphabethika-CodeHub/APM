<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Employee Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form form-vertical" method="POST" action="{{ URL('/home/create-employee') }}" enctype="multipart/form-data">

                    @csrf

                    <div class="row">

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
                                <label for="name">Nama Lengkap</label>
                                <div class="position-relative">
                                    <input type="name" name="name" class="form-control" placeholder="Nama Lengkap" id="name" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-pen"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="phone">Nomor Handphone</label>
                                <div class="position-relative">
                                    <input type="phone" name="phone" class="form-control" placeholder="Nomor Handphone" id="phone" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-phone"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-2 mb-1">
                            <label for="location">Upload Foto</label>
                            <div class="form-group">
                                <input class="form-control"  name="image" type="file" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="email">Alamat Email</label>
                                <div class="position-relative">
                                    <input type="email" name="email" class="form-control" placeholder="Alamat Email" id="email" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Password input -->
                        <div class="row mb-3">
                            <div class="col">
                                <!-- Password input -->
                                <div class="form-outline">
                                    <label class="form-label" for="passoword">Password</label>
                                    <input required name="password" type="password" id="password" class="form-control @error('password') is-invalid @enderror" />
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col">
                                <!-- Confirm Password input -->
                                <div class="form-outline">
                                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                                    <input required name="password_confirmation" type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" />
                                </div>

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn btn-primary">Create Account</button>
                        </div>

                    </div>                        
                </form>
            </div>
        </div>
    </div>
</div>