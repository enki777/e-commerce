@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Delete my account
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.delete-confirm') }}">
                            @csrf
                            @method('DELETE')
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
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
