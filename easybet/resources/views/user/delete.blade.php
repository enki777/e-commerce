@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <table class="table table-dark table-striped rounded-bottom">
                    <form method="post" action="{{ route('user.delete-confirm') }}">
                        @csrf
                        @method('DELETE')
                        <thead>
                        <tr>
                            <th scope="col">Password</th>
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
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btn-danger" type="submit">Delete</button>
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
