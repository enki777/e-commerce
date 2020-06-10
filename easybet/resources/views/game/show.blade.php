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
                        <th scope="col">Updated at</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="align-middle">
                            <img src="{{ asset($game->image) }}">
                            <br>
                            {{ $game->image }}
                        </td>
                        <td class="align-middle">{{ $game->name }}</td>
                        <td class="align-middle">{{ $game->updated_at }}</td>
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
