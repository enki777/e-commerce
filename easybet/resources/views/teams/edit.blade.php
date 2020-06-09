@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">Teams edit</p>
                </header>
                <div class="card-body">
                    <form action="{{ route('teams.update', $team->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <label class="col-form-label text-right">Name</label>
                            <div class="col-4">
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $team->name) }}">
                                @error('name')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <select name="structures_id" class="browser-default custom-select">
                                    <option selected disabled>Please choose a structure</option>
                                    @foreach($structures as $structure)
                                    <option value="{{$structure->id}}">{{$structure->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary">Modifier</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection