@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Edit game
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.game-update', $game->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">Name</label>
                                <div class="col-6">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                           name="name" value="{{ old('name', $game->name) }}">
                                    @error('name')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">Image</label>
                                <div class="col-6">
                                    <div class="custom-file">
                                        <input class="custom-file-input @error('image') is-invalid @enderror"
                                               type="file" name="image">
                                        <label class="custom-file-label">Choose a file</label>
                                        @error('image')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">Categories</label>
                                <div class="col-6">
                                    @foreach($categories as $category)
                                        <div class="form-check-inline mt-2">
                                            <input class="form-check-input @error('categories.*') is-invalid @enderror"
                                                   type="checkbox" name="categories[]"
                                                   value="{{ $category->id }}"
                                                   @if($game->categories->contains('id', '=', $category->id)) checked @endif>
                                            <label class="form-check-label">{{ $category->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-6 offset-4">
                                    <button class="btn btn-success" type="submit">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <a href="{{ route('admin.dashboard') }}">
                    <button class="btn btn-primary">
                        Dashboard
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
