@extends('layouts.MDB.MDB5')

@section('title', 'APM - Register')

@section('content')
<div class="container">
    
    <a href="{{ URL('/') }}"><i class="fas fa-arrow-left me-2 mt-3"></i>Kembali</a>    

    <div class="row justify-content-center">
        <div class="col-md-4">
            {{-- <form action="{{ URL('/home/create-public') }}" method="POST" style="margin-top: 50px" class="mb-4"> --}}
            <form action="{{ Route('register') }}" method="POST" style="margin-top: 50px" class="mb-4">

                @csrf

                <img class="img-fluid" src="{{ asset('images/think.png') }}" alt="">
                <hr>
                    <p class="text-center"><strong>Register | Aplikasi Pengaduan Masyarakat</strong></p>
                    
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
                <hr>

                <!-- Username input -->
                <div class="form-outline mb-4">
                  <input name="username" type="text" id="username" class="form-control @error('username') is-invalid @enderror " required/>
                  <label class="form-label" for="username">Username</label>
                </div>
                
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                {{-- Email input --}}
                <div class="form-outline mb-4">
                  <input name="email" type="email" id="email" class="form-control @error('email') is-invalid @enderror" required/>
                  <label class="form-label" for="email">Email Address</label>
                </div>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                {{-- Phone input --}}
                <div class="form-outline mb-4">
                  <input name="phone" type="text" id="phone" class="form-control @error('phone') is-invalid @enderror" required maxlength="14"/>
                  <label class="form-label" for="phone">+62 | Phone Number / Whatsapp</label>
                </div>

                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <span>Pilih Gambar Profile Anda</span>
                <hr>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="card bg-dark text-white mt-2">
                            <img src="{{ asset('images/faces/1.jpg') }}" class="card-img" alt="...">
                            <div class="card-img-overlay">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="image1" name="image" id="flexRadioDefault1" checked>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card bg-dark text-white mt-2">
                            <img src="{{ asset('images/faces/2.jpg') }}" class="card-img" alt="...">
                            <div class="card-img-overlay">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="image2" name="image" id="flexRadioDefault2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card bg-dark text-white mt-2">
                            <img src="{{ asset('images/faces/3.jpg') }}" class="card-img" alt="...">
                            <div class="card-img-overlay">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="image3" name="image" id="flexRadioDefault3">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card bg-dark text-white mt-2">
                            <img src="{{ asset('images/faces/4.jpg') }}" class="card-img" alt="...">
                            <div class="card-img-overlay">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="image4" name="image" id="flexRadioDefault4">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card bg-dark text-white mt-2">
                            <img src="{{ asset('images/faces/5.jpg') }}" class="card-img" alt="...">
                            <div class="card-img-overlay">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="image5" name="image" id="flexRadioDefault5">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card bg-dark text-white mt-2">
                            <img src="{{ asset('images/faces/6.jpg') }}" class="card-img" alt="...">
                            <div class="card-img-overlay">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="image6" name="image" id="flexRadioDefault6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                <!-- Password input -->
                <div class="row mb-3">
                    <div class="col">
                        <!-- Password input -->
                        <div class="form-outline">
                            <input name="password" type="password" id="passoword" class="form-control @error('password') is-invalid @enderror" />
                            <label class="form-label" for="passoword">Password</label>
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
                            <input name="password_confirmation" type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" />
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                        </div>

                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>

                <hr class="my-4">
              
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Create Account</button>
              
                <!-- Register buttons -->
                <div class="text-center">
                    <a href="{{ ROUTE('login') }}"><p><u>Already have an account? Login</u></p></a>
                </div>
              </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>        
        function setInputFilter(textbox, inputFilter) {
            ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
                textbox.addEventListener(event, function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    this.value = "";
                }
                });
            });
        }

            setInputFilter(document.getElementById("phone"), function(value) {
            return /^\d*$/.test(value); 
        });
    </script>
@endsection


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
