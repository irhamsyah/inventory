@extends('layout.layoutlogin')
@section('content')
{{-- @if(!Auth::check()) --}}
<div class="row">
    <div class="col-md-10 offset=md-1">
        <div class="row">
            <div class="col-md-5 tulisan-kiri">
            <img src="{{asset('img/download.jpeg
')}}" alt="">
                <h3>Toko Arifin </h3>
                <p><h3>Aplikasi POS</h3></p>
                <!-- <button type="button" class="btn btn-primary">Join Us</button> -->
            </div>
            <div class="col-md-7 tulisan-kanan">
                <h2>Form Login</h2>
                <div class="card-body">
                    <form method="POST" action="{{ route('adminlogin') }}">
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

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    <a href="{{ route('register') }}" style="margin-left:5cm">Register</a>

                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
{{-- @endif --}}
@endsection