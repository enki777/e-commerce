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
                        <th scope="col" colspan="4">
                            <p class="text-primary m-0">Match's closing</p>
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
                        <td class="align-middle">{{$match->name}}</td>
                        <td class="align-middle">{{$game->name}}</td>
                        <td class="align-middle">{{$match->openning}}</td>
                        <td class="align-middle">{{$match->ending ?? "date unavailable"}}</td>
                        <td class="align-middle">{{$team1->name}}</td>
                        <td class="align-middle text-primary">VS</td>
                        <td class="align-middle">{{$team2->name}}</td>
                        <td><a href="{{route('matches.teams.details', [$match->id,$team1->id,$team2->id])}}"><button class="btn btn-info">Teams Details</button></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection