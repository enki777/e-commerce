@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title m-0">
                    <svg class="bi bi-shield-shaded" width="1em" height="1em" viewBox="0 0 16 20"
                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z"/>
                        <path
                            d="M8 2.25c.909 0 3.188.685 4.254 1.022a.94.94 0 0 1 .656.773c.814 6.424-4.13 9.452-4.91 9.452V2.25z"/>
                    </svg>
                    Dashboard
                </h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title m-0">Manage games</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th class="align-middle text-center">
                                            Games
                                        </th>
                                        <th class="text-right">
                                            <a href="{{ route('admin.game-create') }}">
                                                <button class="btn btn-primary">
                                                    Create game
                                                </button>
                                            </a>
                                        </th>
                                    </tr>
                                    @if(session()->get('game-created'))
                                        <tr>
                                            <th colspan="2" class="p-0">
                                                <div class="alert alert-success m-0 rounded-0 text-center">
                                                    <svg class="bi bi-info-circle mb-1 mr-2" width="20"
                                                         viewBox="0 0 16 16" fill="currentColor"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                        <path
                                                            d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                                        <circle cx="8" cy="4.5" r="1"/>
                                                    </svg>
                                                    {{ session()->get('game-created') }}
                                                </div>
                                            </th>
                                        </tr>
                                    @elseif(session()->get('game-updated'))
                                        <tr>
                                            <th colspan="2" class="p-0">
                                                <div class="alert alert-success m-0 rounded-0 text-center">
                                                    <svg class="bi bi-info-circle mb-1 mr-2" width="20"
                                                         viewBox="0 0 16 16" fill="currentColor"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                        <path
                                                            d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                                        <circle cx="8" cy="4.5" r="1"/>
                                                    </svg>
                                                    {{ session()->get('game-updated') }}
                                                </div>
                                            </th>
                                        </tr>
                                    @elseif(session()->get('game-deleted'))
                                        <tr>
                                            <th colspan="2" class="p-0">
                                                <div class="alert alert-success m-0 rounded-0 text-center">
                                                    <svg class="bi bi-info-circle mb-1 mr-2" width="20"
                                                         viewBox="0 0 16 16" fill="currentColor"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                        <path
                                                            d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                                        <circle cx="8" cy="4.5" r="1"/>
                                                    </svg>
                                                    {{ session()->get('game-deleted') }}
                                                </div>
                                            </th>
                                        </tr>
                                    @endif
                                    </thead>
                                    <tbody>
                                    @foreach($games as $game)
                                        <tr>
                                            <td colspan="2">
                                                @if($game->image)
                                                    <img src="{{ asset('storage/'.$game->image) }}"
                                                         class="img-thumbnail border-0 bg-transparent p-0 mr-3"
                                                         alt="game-image"
                                                         width="40">
                                                @endif
                                                <strong>{{ $game->name }}</strong>
                                                <div class="float-right mt-2">
                                                    <a href="{{ route('admin.game-show', $game->id) }}"
                                                       class="text-decoration-none mr-3">
                                                        <svg class="bi bi-eye-fill" width="25"
                                                             viewBox="0 0 16 16" fill="gray"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                            <path fill-rule="evenodd"
                                                                  d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                        </svg>
                                                    </a>
                                                    <a href="{{ route('admin.game-edit', $game->id) }}"
                                                       class="text-decoration-none mr-3">
                                                        <svg class="bi bi-pencil-square" width="20"
                                                             viewBox="0 0 16 16" fill="green"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd"
                                                                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                    </a>
                                                    <a href="{{ route('admin.game-delete', $game->id) }}"
                                                       onclick="event.preventDefault(); document.getElementById('game-delete').submit()"
                                                       class="text-decoration-none mr-1">
                                                        <svg class="bi bi-trash-fill" width="20"
                                                             viewBox="0 0 16 16" fill="red"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                  d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                                        </svg>
                                                    </a>
                                                    <form id="game-delete" class="d-none" method="post"
                                                          action="{{ route('admin.game-delete', $game->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title m-0">Manage matches</h4>
                            </div>
                            <div class="card-body">
                                dljefngsjhngdhfg,kl
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title m-0">Manage categories</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th class="align-middle text-center"><p class="m-0 ml-n2">Categories</p></th>
                                        <th class="text-right">
                                            <a href="#">
                                                <button class="btn btn-primary">
                                                    Create category
                                                </button>
                                            </a>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td colspan="2">
                                                <strong>{{ $category->name }}</strong>
                                                <div class="float-right">
                                                    <a href="{{----}}"
                                                       class="text-decoration-none mr-3">
                                                        <svg class="bi bi-eye-fill" width="25"
                                                             viewBox="0 0 16 16" fill="gray"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                            <path fill-rule="evenodd"
                                                                  d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                        </svg>
                                                    </a>
                                                    <a href="{{----}}"
                                                       class="text-decoration-none mr-3">
                                                        <svg class="bi bi-pencil-square" width="20"
                                                             viewBox="0 0 16 16" fill="green"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd"
                                                                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                    </a>
                                                    <a href="{{----}}"
                                                       onclick="event.preventDefault(); document.getElementById('category-delete').submit()"
                                                       class="text-decoration-none mr-1">
                                                        <svg class="bi bi-trash-fill" width="20"
                                                             viewBox="0 0 16 16" fill="red"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                  d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                                        </svg>
                                                    </a>
                                                    <form id="category-delete" class="d-none" method="post"
                                                          action="{{----}}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
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
        </div>
    </div>
@endsection
