@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1 class="float-left">Players</h1>
                    <a href="{{route('players.index')}}"><button class="btn btn-primary float-right">back</button></a>
                </div>

                <div class="card-body">
                    <form action="{{route('players.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Player's Firstname</label>
                            <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}">
                            @error('firstname')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Player's Lastname</label>
                            <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}">
                            @error('lastname')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Player's Pseudo</label>
                            <input type="text" name="pseudo" class="form-control @error('pseudo') is-invalid @enderror" value="{{ old('pseudo') }}">
                            @error('pseudo')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Player's Age</label>
                            <input type="number" name="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age') }}" min="10" max="100">
                            @error('age')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <select name="teams_id" class="browser-default custom-select">
                            <option selected disabled>Please choose a Team</option>
                            @foreach($teams as $team)
                            <option value="{{$team->id}}">{{$team->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection