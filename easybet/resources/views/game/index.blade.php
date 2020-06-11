@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <table class="table table-dark table-striped rounded-bottom">
                    <thead>
                    @if(session()->get('store'))
                        <tr>
                            <th colspan="6">
                                <div class="alert alert-success text-center m-0">
                                    {{ session()->get('store') }}
                                </div>
                            </th>
                        </tr>
                    @elseif(session()->get('update'))
                        <tr>
                            <th colspan="6">
                                <div class="alert alert-success text-center m-0">
                                    {{ session()->get('update') }}
                                </div>
                            </th>
                        </tr>
                    @elseif(session()->get('delete'))
                        <tr>
                            <th colspan="6">
                                <div class="alert alert-danger text-center m-0">
                                    {{ session()->get('delete') }}
                                </div>
                            </th>
                        </tr>
                    @endif
                    <tr>
                        <th scope="col" class="align-middle text-center">Image</th>
                        <th scope="col" colspan="2" class="align-middle">Game</th>
                        @if(Auth::user()->admin == 1)
                            <th></th>
                            <th scope="col" class="align-middle">
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
                            <td class="align-middle text-center">
                                @if($game->image)
                                    <img src="{{ asset('storage/'.$game->image) }}" alt="game" class="img-thumbnail p-0"
                                         width="50">
                                @else
                                    #
                                @endif
                            </td>
                            <td class="align-middle">{{ $game->name }}</td>
                            <td class="align-middle">
                                <a href="{{ route('game.show', $game->id) }}">
                                    <button class="btn btn-primary">Details</button>
                                </a>
                            </td>
                            @if(Auth::user()->admin == 1)
                                <td class="align-middle">
                                    <a href="{{ route('game.edit', $game->id) }}">
                                        <button class="btn btn-success">
                                            Update
                                        </button>
                                    </a>
                                </td>
                                <td class="align-middle">
                                    <form method="post" action="{{ route('game.destroy', $game->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $games->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
