@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <table class="table table-dark table-striped rounded-bottom">
                    <form method="post" action="{{ route('user.update-password') }}">
                        @csrf
                        @method('PATCH')
                        <thead>
                        @if(session()->get('password-success'))
                            <tr>
                                <th colspan="3">
                                    <div class="alert alert-success m-0 text-center">
                                        {{ session()->get('password-success') }}
                                    </div>
                                </th>
                            </tr>
                        @endif
                        <tr>
                            <th scope="col">Password</th>
                            <th scope="col">New password</th>
                            <th scope="col">New password confirmation</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <input class="form-control @error('password') is-invalid @enderror" type="password"
                                       name="password">
                                @error('password')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </td>
                            <td>
                                <input class="form-control @error('new_password') is-invalid @enderror" type="password"
                                       name="new_password">
                                @error('new_password')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </td>
                            <td>
                                <input class="form-control @error('new_password_confirmation') is-invalid @enderror" type="password"
                                       name="new_password_confirmation">
                                @error('new_password_confirmation')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btn-success">Update</button>
                            </td>
                        </tr>
                        </tbody>
                    </form>
                </table>
                <a href="{{ route('user.profile') }}">
                    <button class="btn btn-dark mt-2">Back</button>
                </a>
            </div>
        </div>
    </div>
@endsection
