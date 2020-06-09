@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Change password
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.update-password') }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">Password</label>
                                <div class="col-6">
                                    <input class="form-control @error('password') is-invalid @enderror" type="password"
                                           name="password">
                                    @error('password')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">New password</label>
                                <div class="col-6">
                                    <input class="form-control @error('new_password') is-invalid @enderror"
                                           type="password" name="new_password">
                                    @error('new_password')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">New password confirmation</label>
                                <div class="col-6">
                                    <input class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                           type="password" name="new_password_confirmation">
                                    @error('new_password_confirmation')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6 offset-4">
                                    <button class="btn btn-success">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
