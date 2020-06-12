@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <table class="table table-dark table-striped rounded-bottom">
                    <thead>
                    <tr>
                        <th class="align-middle text-center">
                            {{ $team1->name }}
                        </th>
                        <th class="align-middle text-primary text-center">
                            VS
                        </th>
                        <th class="align-middle text-center">
                            {{ $team2->name }}
                        </th>
                    </tr>
                    <tr>
                        <th class="align-middle text-center">
                            Match
                        </th>
                        <th class="align-middle text-center" colspan="2">
                            {{ $match->name }}
                        </th>
                    </tr>
                    <tr>
                        <th class="align-middle text-center">
                            Game
                        </th>
                        <th class="align-middle text-center" colspan="2">
                            @if($game->image)
                                <img src="{{ asset('storage/'.$game->image) }}" class="img-thumbnail p-0 mr-3"
                                     width="25"
                                     alt="game">
                                {{ $game->name }}
                            @else
                                #
                                {{ $game->name }}
                            @endif
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="3" class="align-middle text-center">
                            <form method="post" action="{{ route('bet-confirm', $match->id) }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-4 col-form-label text-right">Amount</label>
                                    <div class="col-4">
                                        <input class="form-control @error('amount') is-invalid @enderror" type="number"
                                               step="0.1" name="amount" value="{{ old('amount') }}">
                                        @error('amount')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                        @if(session()->get('negative'))
                                            <div class="alert alert-danger">
                                                {{ session()->get('negative') }}
                                            </div>
                                        @endif
                                    </div>
                                    <button class="btn btn-success" type="submit">
                                        Bet
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
