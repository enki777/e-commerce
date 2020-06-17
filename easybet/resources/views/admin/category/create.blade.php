@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Create category
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.category-store') }}">
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
                            <div class="form-group row mb-0">
                                <div class="col-6 offset-4">
                                    <button class="btn btn-primary">
                                        Create
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
