@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="hold-transition login-page">
        <div class="text-center">
            <h1><img src="{{ asset('images/xu_logo.png') }}" class="img-fluid" style="max-width: 100%; height: auto;">
                <div><b>Student Registration</b></div>
            </h1> 
        </div>

        <div class="login-box rounded mt-2">
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form method="post" action="{{ url('/login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Email"
                                class="form-control @error('email') is-invalid @enderror">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                            </div>
                            @error('email')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="password"
                                name="password"
                                placeholder="Password"
                                class="form-control @error('password') is-invalid @enderror">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">Remember Me</label>
                                </div>
                            </div>

                            <div class="col-4">
                                <button type="submit" class="btn btn-outline-primary btn-block">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      
        <script src="{{ mix('js/app.js') }}" defer></script>    
   
    </div>
@endsection