@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">Username</label>
                                <div class="col-6">
                                    <input class="form-control" type="text" name="username"
                                           value="{{ old('username') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">Password</label>
                                <div class="col-6">
                                    <input class="form-control" type="password" name="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6 offset-4">
                                    <button class="btn btn-primary">
                                        Sign in
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link"
                                           href="{{ route('password.request') }}">
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
@endsection
