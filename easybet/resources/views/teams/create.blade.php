@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1 class="float-left">Teams</h1>
                    <a href="{{route('teams.index')}}"><button class="btn btn-primary float-right">back</button></a>
                </div>

                <div class="card-body">
                    <form action="{{route('teams.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <label class="col-form-label text-right">Team's name</label>
                            <div class="col-4">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
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
                                <button class="btn btn-primary">Créer</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection