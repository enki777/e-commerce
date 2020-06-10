@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col--8">
            <table class="table table-dark table-striped rounded-bottom mt-5">
                <thead>
                    <tr>
                        <th scope="col">
                            <p class="text-primary m-0">Match's name</p>
                        </th>
                        <th scope="col">
                            <p class="text-primary m-0">Match's game</p>
                        </th>
                        <th scope="col">
                            <p class="text-primary m-0">Match's opening</p>
                        </th>
                        <th scope="col">
                            <p class="text-primary m-0">Player's closing</p>
                        </th>
                        <th>
                            <a href="{{ route('matches.index') }}">
                                <button class="btn btn-primary float-right mr-4 pl-3 pr-3">Back</button>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$match->name}}</td>
                        <td>{{$game->name}}</td>
                        <td>{{$match->created_at}}</td>
                        <td></td>
                        <td><a href="{{route('game.show', $game->id)}}"><button class="btn btn-info">Game Details</button></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection