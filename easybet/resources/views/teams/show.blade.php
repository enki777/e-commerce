@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4 bg-dark">
                <header class="card-header">
                    <h4 class="card-header-title float-left text-white mr-5"> Structure : {{$structures}}</h4>
                    <h4 class="card-header-title float-left text-white">Team : {{$team->name}}</h4>
                    <a href="{{route('teams.index')}}"><button class="btn btn-primary float-right">back</button></a>
                </header>
                <div class="card-body">
                    <table class="table table-dark">
                        <thead>
                            <th class="text-primary">Players : </th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($players as $player)
                            <tr>
                                <td><strong> {{$player->pseudo}}</strong></td>
                                <td><a href="{{route('players.show',[$player, $team])}}"><button class="btn btn-primary float-right">Details</button></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection