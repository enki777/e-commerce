@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col--8">
            <table class="table table-dark table-striped rounded-bottom mt-5">
                <thead>
                    <tr>
                        <th scope="col">
                            <p class="text-primary m-0">Player's Fisrtname</p>
                        </th>
                        <th scope="col">
                            <p class="text-primary m-0">Player's Lastname</p>
                        </th>
                        <th scope="col">
                            <p class="text-primary m-0">Player's Pseudo</p>
                        </th>
                        <th scope="col">
                            <p class="text-primary m-0">Player's Age</p>
                        </th>
                        <th scope="col">
                            <p class="text-primary m-0">Player's Team</p>
                        </th>
                        <th>
                            <a href="{{ route('players.index') }}">
                                <button class="btn btn-primary float-right mr-4 pl-3 pr-3">Back</button>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$player->fisrtname}}</td>
                        <td>{{$player->lastname}}</td>
                        <td>{{$player->pseudo}}</td>
                        <td>{{$player->age}}</td>
                        <td>{{$team->name}}</td>
                        <td><a href="{{route('teams.show', $team->id)}}"><button class="btn btn-info">Team Details</button></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection