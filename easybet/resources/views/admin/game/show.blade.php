@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title text-center">
                            <img src="{{ asset('storage/'.$game->image) }}" class="img-thumbnail p-0"
                                 alt="game-image" width="50">
                            {{ $game->name }}
                        </h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 text-center">
                                <h4>Categories :</h4>
                                @foreach($game->categories as $category)
                                    <p class="m-0">{{ $category->name }}</p>
                                @endforeach
                            </div>
                            <div class="col-6 d-flex justify-content-center">
                                <a href="{{ route('admin.game-edit', $game->id) }}">
                                    <button class="btn-lg btn-success mr-3">
                                        Edit
                                        <svg class="bi bi-pencil-square mb-1" width="20" viewBox="0 0 16 16"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd"
                                                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </button>
                                </a>
                                <form method="post" action="{{ route('admin.game-delete', $game->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-lg btn-danger" type="submit">
                                        Delete
                                        <svg class="bi bi-trash-fill mb-1" width="1em" height="1em" viewBox="0 0 16 16"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('admin.dashboard') }}">
                    <button class="btn btn-primary">
                        Dashboard
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
