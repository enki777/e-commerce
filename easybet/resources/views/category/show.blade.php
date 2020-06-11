@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <table class="table table-dark table-striped rounded-bottom">
                    <thead>
                    <tr>
                        <th scope="col">Category</th>
                        <th scope="col">{{ $category->name }}</th>
                    </tr>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Game</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($games as $game)
                        <tr>
                            @if($game->image)
                                <td class="align-middle"><img class="img-thumbnail p-0"
                                                              src="{{ asset('storage/'.$game->image) }}" width="50">
                                </td>
                            @else
                                <td>#</td>
                            @endif
                            <td class="align-middle">{{ $game->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="{{ route('category.index') }}">
                    <button class="btn btn-light">
                        Back
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
