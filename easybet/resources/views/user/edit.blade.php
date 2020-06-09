@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Edit my profile
                    </div>
                    <div class="card-body">
                        @if (session()->get('update-success'))
                            <div class="alert alert-success text-center">
                                {{ session()->get('update-success') }}
                            </div>
                        @endif
                        <form method="post" action="{{ route('user.update') }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">Username</label>
                                <div class="col-6">
                                    <input class="form-control @error('username') is-invalid @enderror" type="text"
                                           name="username" value="{{ old('username', $user->username) }}">
                                    @error('username')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">First name</label>
                                <div class="col-6">
                                    <input class="form-control @error('first_name') is-invalid @enderror" type="text"
                                           name="first_name" value="{{ old('first_name', $user->first_name) }}">
                                    @error('first_name')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">Last name</label>
                                <div class="col-6">
                                    <input class="form-control @error('last_name') is-invalid @enderror" type="text"
                                           name="last_name" value="{{ old('last_name', $user->last_name) }}">
                                    @error('last_name')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">Birthday</label>
                                <div class="col-6">
                                    <input class="form-control @error('birthday') is-invalid @enderror" type="date"
                                           name="birthday" value="{{ old('birthday', $user->birthday) }}">
                                    @error('birthday')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">Address</label>
                                <div class="col-6">
                                    <input class="form-control @error('address') is-invalid @enderror" type="text"
                                           name="address" value="{{ old('address', $user->address) }}">
                                    @error('address')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">City</label>
                                <div class="col-6">
                                    <input class="form-control @error('city') is-invalid @enderror" type="text"
                                           name="city" value="{{ old('city', $user->city) }}">
                                    @error('city')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">E-mail address</label>
                                <div class="col-6">
                                    <input class="form-control @error('email') is-invalid @enderror" type="text"
                                           name="email" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
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
                                <div class="col-6 offset-4">
                                    <button class="btn btn-success" type="submit">
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
