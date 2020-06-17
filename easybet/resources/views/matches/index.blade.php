@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- NAV -->
    <div class="row">
        <div class="col-4 d-flex justify-content-center  mb-4 mt-4">
            <button class="btn btn-outline-light">Categories</button>
        </div>
        <div class="col-4 d-flex justify-content-center mb-4 mt-4">
            <a href="" class="btn btn-outline-light">Games</a>
        </div>
        <div class="col-4 d-flex justify-content-center mb-4 mt-4">
            <a href="" class="btn btn-outline-light">Esport</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <!-- SEARCH AND CATEGORIES  -->
        <div class="col-2 p-0">
            <div class="col-12">
                <div class="card text-white bg-dark">
                    <div class="card-header">
                        <h3>Search for Matches</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('matches.search')}}" method="GET">
                            @csrf
                            <div class="form-group">
                                <label>Match's name</label>
                                <input type="search" id="search" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </form>
                        <p id="infosearch"></p>
                        <script>
                            $(document).ready(() => {
                                $('#search').on('input', () => {
                                    let value = $('#search').val();
                                    value = value.trim();
                                    if (!value) {
                                        $('.results').html('');
                                    } else {
                                        $('#search-error').html('');
                                        $.ajax({
                                            type: 'GET',
                                            url: 'matches/search',
                                            data: {
                                                name: value,
                                            },
                                            success: (data) => {
                                                // if (!value) {
                                                //     $('#infosearch').html('');
                                                // } else {
                                                //     $('#infosearch').html('Matches found for : ' + value).css('color','green');
                                                // }
                                                let matchestab = [];
                                                $.each(data, function(k, v) {
                                                    matchestab.push(v['name'] + "</a><br>");
                                                });
                                                $('.results').html(matchestab);
                                            },
                                        })
                                    }
                                })
                            });
                        </script>
                    </div>
                    <div class="card-footer">
                        <div class="results"></div>
                    </div>
                </div>
            </div>
            <br>
            <!-- CATEGOERIES -->
            <div class="col-12">
                <div class="card bg-dark text-white">
                    <div class="card-header">
                        <h3>Categories</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($categories as $category)
                            <li class="list-group-item text-dark">
                                <a href="{{route('matches.categories.game', $category->id)}}" class="text-decoration-none text-dark">
                                    {{$category->name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- MATCHES  -->
        <div class="col-8 p-0">
            <div class="row">
                <div class="col-12">
                    <!-- GAMES -->
                    <ul class="nav nav-pills bg-dark rounded justify-content-center p-4">
                        @foreach($games as $game)
                        <li class="nav-item p-2 mr-5">
                            <a href="{{route('matches.game', $game->id)}}"><img src="{{asset('storage/'.$game->image)}}" alt="" class="img-thumbnail p-0" width="60"></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <br><br>
            <div id="example"></div>
            <!-- AVAILABLE MATCHES  -->
            <h4 class="text-white">Available Matches</h4>
            <table class="table table-dark table-striped rounded">
                <thead class="">
                    @if(session()->has('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <tr>
                        <th scope="col" class="border-top-0">
                            <p class="text-primary m-0">Openning</p>
                        </th>
                        <th scope="col" class="border-top-0">
                            <p class="text-primary m-0">Matches</p>
                        </th>
                        <th scope="col" class="border-top-0" colspan="6">
                            <p class="text-primary m-0">Game</p>
                        </th>

                        @if(Auth::user()->admin == 1)
                        <th colspan="4"><a href="{{route('matches.create')}}">
                                <button class="btn btn-primary float-right mr-4">Create Match</button>
                            </a></th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($available as $match)
                    <tr>
                        <td class="text-success">{{$match->openning}}</td>
                        <td>{{$match->name}}</td>
                        <td>{{$match->games->name}}</td>
                        <td>{{$match->team1->name}}</td>
                        <td>
                            <p class="text-primary"> in {{$match->days}} Days</p>
                        </td>
                        <td>{{$match->team2->name}}</td>
                        @if(Auth::user()->admin == 1)
                        @if($match->deleted_at)
                        <form action="{{ route('matches.restore', $match->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <td>
                                <button class="btn btn-primary" type="submit">Restore</button>
                            </td>
                        </form>
                        @else
                        <td><a class="btn btn-primary" href="{{ route('matches.show', $match->id) }}">Details</a>
                        </td>
                        @endif
                        @if($match->deleted_at)
                        @else
                        <td><a class="btn btn-success" href="{{ route('matches.edit', $match->id) }}">Edit</a></td>
                        @endif
                        <form action="{{ route($match->deleted_at? 'matches.force.destroy' : 'matches.destroy', $match->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <td colspan="2">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </td>
                        </form>
                        @else
                        <td><a class="btn btn-primary" href="{{ route('matches.show', $match->id) }}">Details</a></td>
                        @endif
                        <td><a href="{{ route('bet', $match->id) }}">
                                <button class="btn btn-success">Bet</button>
                            </a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br><br>
            <!-- FINISHED MATCHES  -->
            <h4 class="text-white">Finished Matches</h4>
            <table class="table table-dark table-striped rounded-bottom">
                <thead>
                    <tr>
                        <th>
                            <p class="text-primary m-0">Ended</p>
                        </th>
                        <th scope="col">
                            <p class="text-primary m-0">Matches</p>
                        </th>
                        <th scope="col" colspan="6">
                            <p class="text-primary m-0">Game</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($finished as $match)
                    <tr>
                        <td class="text-danger">{{$match->ending ?? "date not available"}}</td>
                        <td>{{$match->name}}</td>
                        <td>{{$match->games->name}}</td>
                        <td>{{$match->team1->name}}</td>
                        <td class="text-primary">ended {{$match->days}} days ago</td>
                        <td>{{$match->team2->name}}</td>
                        <td><a class="btn btn-primary" href="{{ route('matches.show', $match->id) }}">Details</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-2">
            <div class="card bg-dark text-white">
                <div class="card-header">
                    <h3>Most Popular Matches</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group text-dark">
                        @foreach($most_popular as $mp)
                        <li class="list-group-item">
                            {{ $mp->name }}
                            <br>
                            <small>Bets : {{ $mp->bets->count() }}</small>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection