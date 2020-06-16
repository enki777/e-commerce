@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Create game
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.game-store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">Name</label>
                                <div class="col-6">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                           name="name" value="{{ old('name') }}">
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
                                    </div>
                                    @error('image')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">Categories</label>
                                @foreach($categories as $category)
                                    <div class="form-check-inline ml-3">
                                        <input class="form-check-input @error('categories.*') is-invalid @enderror"
                                               type="checkbox" name="categories[]"
                                               value="{{ $category->id }}">
                                        <label class="form-check-label">{{ $category->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group row">
                                <div class="col-6 offset-4">
                                    <button class="btn btn-primary">
                                        Create
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
