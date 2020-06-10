@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <header class="card-header">
                    <h1 class="card-header-title">Structure edit</h1>
                </header>
                <div class="card-body">
                    <form action="{{ route('structures.update', $structure->id) }}" method="POST" class="form-inline">
                        @csrf
                        @method('put')
                        <div class="form-group col-10">
                            <label class="mr-5">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $structure->name) }}">
                            @error('name')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-2">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection