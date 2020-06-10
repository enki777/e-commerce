@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <table class="table table-dark table-striped rounded-bottom">
                    <thead>
                    <tr>
                        <th scope="col" class="align-middle">Game</th>
                        <th scope="col" colspan="2" class="align-middle">Updated at</th>
                        @if(Auth::user()->admin == 1)
                            <th></th>
                            <th scope="col">
                                <a href="{{ route('game.create') }}" class="my-auto">
                                    <button class="btn btn-primary">
                                        Create
                                    </button>
                                </a>
                            </th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($games as $game)
                        <tr>
                            <td class="align-middle">{{ $game->name }}</td>
                            <td class="align-middle">{{ $game->updated_at }}</td>
                            <td>
                                <a href="{{ route('game.show', $game->id) }}">
                                    <button class="btn btn-primary">Details</button>
                                </a>
                            </td>
                            @if(Auth::user()->admin == 1)
                                <td>
                                    <a href="{{----}}">
                                        <button class="btn btn-success">
                                            Update
                                        </button>
                                    </a>
                                </td>
                                <td>

                                    <a href="{{----}}">
                                        <button class="btn btn-danger">
                                            Delete
                                        </button>
                                    </a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
