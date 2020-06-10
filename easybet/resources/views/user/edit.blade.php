@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <table class="table table-dark table-striped rounded-bottom">
                    <form method="post" action="{{ route('user.update') }}">
                        @csrf
                        @method('PATCH')
                        <thead>
                        @if(session()->get('update-success'))
                            <tr>
                                <th colspan="2">
                                    <div class="alert alert-success m-0 text-center">
                                        {{ session()->get('update-success') }}
                                    </div>
                                </th>
                            </tr>
                        @endif
                        <tr>
                            <th scope="col">Username</th>
                            <th scope="col">First name</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <input class="form-control @error('username') is-invalid @enderror" type="text"
                                       name="username" value="{{ old('username', $user->username) }}">
                                @error('username')
                                <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                                @enderror
                            </td>
                            <td>
                                <input class="form-control @error('first_name') is-invalid @enderror" type="text"
                                       name="first_name" value="{{ old('first_name', $user->first_name) }}">
                                @error('first_name')
                                <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                                @enderror
                            </td>
                        </tr>
                        </tbody>
                        <thead>
                        <tr>
                            <th scope="col">Last name</th>
                            <th scope="col">Birthday</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <input class="form-control @error('last_name') is-invalid @enderror" type="text"
                                       name="last_name" value="{{ old('last_name', $user->last_name) }}">
                                @error('last_name')
                                <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                                @enderror
                            </td>
                            <td>
                                <input class="form-control @error('birthday') is-invalid @enderror" type="date"
                                       name="birthday" value="{{ old('birthday', $user->birthday) }}">
                                @error('birthday')
                                <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                                @enderror
                            </td>
                        </tr>
                        </tbody>
                        <thead>
                        <tr>
                            <th scope="col">Address</th>
                            <th scope="col">City</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <input class="form-control @error('address') is-invalid @enderror" type="text"
                                       name="address" value="{{ old('address', $user->address) }}">
                                @error('address')
                                <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                                @enderror
                            </td>
                            <td>
                                <input class="form-control @error('city') is-invalid @enderror" type="text"
                                       name="city" value="{{ old('city', $user->city) }}">
                                @error('city')
                                <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                                @enderror
                            </td>
                        </tr>
                        </tbody>
                        <thead>
                        <tr>
                            <th scope="col">E-mail address</th>
                            <th scope="col">Password</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <input class="form-control @error('email') is-invalid @enderror" type="text"
                                       name="email"
                                       value="{{ old('email', $user->email) }}">
                                @error('email')
                                <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                                @enderror
                            </td>
                            <td>
                                <input class="form-control @error('password') is-invalid @enderror" type="password"
                                       name="password">
                                @error('password')
                                <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button class="btn btn-success" type="submit">Update</button>
                            </td>
                        </tr>
                        </tbody>
                    </form>
                </table>
                <a href="{{ route('user.profile') }}">
                    <button class="btn btn-light">Back</button>
                </a>
            </div>
        </div>
    </div>
@endsection
