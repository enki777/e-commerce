@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1 class="float-left">Match</h1>
                    <a href="{{route('matches.index')}}"><button class="btn btn-primary float-right">back</button></a>
                </div>

                <div class="card-body">
                    <form action="{{route('matches.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Match's name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <select name="games_id" class="browser-default custom-select mb-3">
                            <option selected disabled>Please choose a Game</option>
                            @foreach($games as $game)
                            <option value="{{$game->id}}">{{$game->name}}</option>
                            @endforeach
                        </select>
                        <select name="teams_id" class="browser-default custom-select mb-3">
                            <option selected disabled>Please choose a Team</option>
                            @foreach($team1 as $team)
                            <option value="{{$team->id}}">{{$team->name}}</option>
                            @endforeach
                        </select>
                        <select name="teams2_id" class="browser-default custom-select">
                            <option selected disabled>Please choose a Team</option>
                            @foreach($team2 as $team)
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