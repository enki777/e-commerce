@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <table class="table table-dark table-striped rounded-bottom">
                    <form method="post" action="{{ route('game.update', $game->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                                       value="{{ old('name', $game->name) }}">
                                @error('name')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </td>
                            <td>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror"
                                           id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                                @error('image')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button class="btn btn-success" type="submit">
                                    Update
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </form>
                </table>
                <a href="{{ route('game.index') }}">
                    <button class="btn btn-light">
                        Back
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
