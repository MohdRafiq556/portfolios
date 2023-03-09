@extends('layouts.app')

@section('content')
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-floating mb-3">
                                        <input name="name" class="form-control @error('name') is-invalid @enderror" id="name" type="text" placeholder="Full Name" />
                                        <label for="name">Full Name</label>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input name="username" class="form-control @error('username') is-invalid @enderror" id="username" type="text" placeholder="Username" />
                                        <label for="username">Username</label>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input name="email" class="form-control @error('email') is-invalid @enderror" id="email" type="email" placeholder="name@example.com" />
                                        <label for="email">Email address</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="password" class="form-control @error('password') is-invalid @enderror" id="password" type="password" placeholder="Create a password" />
                                                <label for="password">Password</label>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="password_confirmation" class="form-control" id="password-confirm" type="password" placeholder="Confirm password" />
                                                <label for="password-confirm">Confirm Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="card-footer text-center py-3">
                                @if (Route::has('login'))
                                    <div class="small">
                                        <a href="{{ route('login') }}">Have an account? Go to login</a>
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