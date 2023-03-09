@extends('layouts.app')

@section('content')
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                @csrf
                                    <div class="form-floating mb-3">

                                        <input name="email" class="form-control @error('email') is-invalid @enderror" id="email" type="email" value="{{ old('email') }}" placeholder="name@example.com"/>
                                        <label for="email">Email address</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="password" class="form-control @error('password') is-invalid @enderror" id="password" type="password" placeholder="Password" />
                                        <label for="password">Password</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-check mb-3">
                                        <input name="remember" class="form-check-input" id="remember" type="checkbox" value="" {{ old('remember') ? 'checked' : '' }} />
                                        <label class="form-check-label" for="remember">Remember Password</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        @if (Route::has('password.request'))
                                            <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                        @endif
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                @if (Route::has('register'))
                                    <div class="small">
                                        <a href="{{ route('register') }}">Need an account? Sign up!</a>
                                    </div>
                                    <div class="small">
                                        <a href="{{ route('home') }}">Return Home</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
