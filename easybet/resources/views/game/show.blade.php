@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <table class="table table-dark table-striped rounded-bottom">
                    <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="align-middle">
                            @if($game->image)
                                <img src="{{ asset('storage/'.$game->image) }}" alt="game" class="img-thumbnail p-0" width="50">
                            @else
                                #
                            @endif
                        </td>
                        <td class="align-middle">{{ $game->name }}</td>
                    </tr>
                    </tbody>
                </table>
                <a href="{{ route('game.index') }}">
                    <button class="btn btn-light">
                        Back
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
