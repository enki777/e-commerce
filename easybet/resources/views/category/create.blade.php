@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <table class="table table-dark table-striped rounded-bottom">
                    <form method="post" action="{{ route('category.store') }}">
                        @csrf
                        <thead>
                        <tr>
                            <th scope="col" class="align-middle">Name</th>
                            <td>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                                       value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </td>
                            <td>
                                <button class="btn btn-primary" type="submit">Create</button>
                            </td>
                        </tr>
                        </thead>
                    </form>
                </table>
                <a href="{{ route('category.index') }}">
                    <button class="btn btn-light">
                        Back
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
