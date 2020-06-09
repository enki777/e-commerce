@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <header class="card-header">
                    <h1 class="card-header-title float-left">Teams description</h1>
                    <a href="{{route('teams.index')}}"><button class="btn btn-primary float-right">back</button></a>
                </header>
                <div class="card-body">
                    <h3>Teams's name : {{$team->name}}</h3>
                    <h3>Team's membership : {{$structures}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection