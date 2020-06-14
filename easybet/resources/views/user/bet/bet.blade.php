@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h1 class="card-title m-0">My bets</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0">
                            <thead>
                            <tr>
                                <th class="text-center">
                                    Match
                                </th>
                                <th class="text-center">
                                    Game
                                </th>
                                <th class="text-center">
                                    Team 1
                                </th>
                                <th></th>
                                <th class="text-center">
                                    Team 2
                                </th>
                                <th class="text-center">
                                    Bet
                                </th>
                                <th class="text-center">
                                    Date
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $bet)
                                <tr>
                                    <td class="text-center align-middle">{{ $bet->name }}</td>
                                    <td class="text-center align-middle">{{ \App\Game::find($bet->games_id)->name }}</td>
                                    <td class="text-center align-middle">{{ \App\Teams::find($bet->teams_id)->name }}</td>
                                    <td class="text-center align-middle">VS</td>
                                    <td class="text-center align-middle">{{ \App\Teams::find($bet->teams2_id)->name }}</td>
                                    <td class="text-center align-middle">{{ $bet->pivot->user_bet }}</td>
                                    <td class="text-center align-middle">
                                        The {{ date('Y M D', strtotime($bet->pivot->created_at)) }}
                                        <br>At {{ date('H:i', strtotime($bet->pivot->created_at)) }}</td>
                                    <td class="text-center align-middle">
                                        <a href="{{-- route('cancel-bet', $bet->pivot->id) --}}">
                                            <button class="btn btn-outline-danger">Cancel</button>
                                        </a>
                                    </td>
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
