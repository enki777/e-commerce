@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1 class="float-left">Players</h1>
                    <a href="{{route('matches.index')}}"><button class="btn btn-primary float-right">back</button></a>
                </div>

                <div class="card-body">
                    <form action="{{route('matches.update',$match->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Match's name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <select name="games_id" class="browser-default custom-select">
                            <option selected disabled>Please choose a Team</option>
                            @foreach($games as $game)
                            <option value="{{$game->id}}">{{$game->name}}</option>
                            @endforeach
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