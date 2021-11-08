@extends('layouts.MDB.MDB5')

@section('title', 'APM - Login')

@section('content')
<div class="container">
    
    <a href="{{ URL('/') }}"><i class="fas fa-arrow-left me-2 mt-3"></i>Kembali</a>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="{{ route('login') }}" method="POST" style="margin-top: 50px" class="mb-4">

                @csrf

                <img class="img-fluid" src="{{ asset('images/think.png') }}" alt="">
                <hr>
                    <p class="text-center"><strong>Login | Aplikasi Pengaduan Masyarakat</strong></p>

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

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check"></i> <strong>Berhasil! - </strong> Akun Anda Berhasil Di Simpan.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                <hr>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input name="username" type="text" id="username" class="form-control" />
                  <label class="form-label" for="username">Username</label>
                </div>
              
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input name="password" type="password" id="password" class="form-control" />
                  <label class="form-label" for="password">Password</label>
                </div>
              
                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                  <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="form2Example3"> Remember me </label>
                    </div>
                  </div>
              
                  <div class="col">
                    <!-- Simple link -->
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                  </div>
                </div>
              
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
              
                <!-- Register buttons -->
                <div class="text-center">                  
                  <a href="{{ ROUTE('register') }}"><p><u>Not a member? Register</u></p></a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
