@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Edit category
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.category-update', $category->id) }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-right">Name</label>
                                <div class="col-6">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                           name="name" value="{{ old('name', $category->name) }}">
                                    @error('name')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-6 offset-4">
                                    <button class="btn btn-success">
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
