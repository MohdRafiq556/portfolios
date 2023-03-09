@extends('layouts.app')

@section('content')
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>
                            <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="small mb-3 text-muted">Enter your email address and we will send you a link to reset your password.</div>
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input name="email" class="form-control @error('email') is-invalid @enderror" id="email" type="email" placeholder="name@example.com" />
                                        <label for="email">Email address</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        @if (Route::has('login'))
                                            <a class="small" href="{{ route('login') }}">Return to login</a>
                                        @endif
                                        <button class="btn btn-primary" type="submit">Reset Password</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                @if (Route::has('register'))
                                    <div class="small">
                                        <a href="{{ route('register') }}">Need an account? Sign up!</a>
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
