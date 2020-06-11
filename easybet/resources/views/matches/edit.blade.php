@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1 class="float-left">Edit {{$match->name}}</h1>
                    <a href="{{route('matches.index')}}"><button class="btn btn-primary float-right">back</button></a>
                </div>

                <div class="card-body">
                    <form action="{{route('matches.update',$match->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Match's name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$match->name) }}">
                            @error('name')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <select name="games_id" class="browser-default custom-select form-control @error('games_id') is-invalid @enderror mb-3">
                            <option selected value="{{$curGame->id}}">{{$curGame->name}}</option>
                            @foreach($games as $game)
                            @if($curGame->id != $game->id)
                            <option value="{{$game->id}}">{{$game->name}}</option>
                            @endif
                            @endforeach
                            @error('name')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </select>
                        <select name="teams_id" class="browser-default custom-select form-control @error('teams_id') is-invalid @enderror mb-3">
                            <option selected value="{{$curTeam1->id}}">{{$curTeam1->name}}</option>
                            @foreach($teams1 as $team)
                            <option value="{{$team->id}}">{{$team->name}}</option>
                            @endforeach
                            @error('teams_id')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </select>
                        <select name="teams2_id" class="browser-default custom-select form-control @error('teams2_id') is-invalid @enderror">
                            <option selected disabled value="{{$team2->id}}">{{$team2->name}}</option>
                            @foreach($teams2 as $team)
                            <option value="{{$team->id}}">{{$team->name}}</option>
                            @endforeach
                            @error('teams2_id')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </select>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection