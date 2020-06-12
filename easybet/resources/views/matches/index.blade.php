@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <table class="table table-dark table-striped rounded-bottom mt-1">
                <thead>
                    @if(session()->has('status'))
                    <div class="alert alert-success mt-3">
                        {{ session('status') }}
                    </div>
                    @endif
                    <tr>
                        <th scope="col">
                            <p class="text-primary m-0">Updated at</p>
                        </th>
                        <th scope="col">
                            <p class="text-primary m-0">Matches</p>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        @if(Auth::user()->admin == 1)
                        <th colspan="4"><a href="{{route('matches.create')}}"><button class="btn btn-primary float-right mr-4">Create Match</button></a></th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($matches as $match)
                    <tr>
                        <td>{{$match->updated_at}}</td>
                        <td>{{$match->name}}</td>
                        <td>{{$match->team1->name}}</td>
                        <td><p class="text-primary">VS</p></td>
                        <td>{{$match->team2->name}}</td>
                        @if(Auth::user()->admin == 1)
                        @if($match->deleted_at)
                        <form action="{{ route('matches.restore', $match->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <td><button class="btn btn-primary" type="submit">Restore</button></td>
                        </form>
                        @else
                        <td><a class="btn btn-primary" href="{{ route('matches.show', $match->id) }}">Details</a></td>
                        @endif
                        @if($match->deleted_at)
                        @else
                        <td><a class="btn btn-success" href="{{ route('matches.edit', $match->id) }}">Edit</a></td>
                        @endif
                        <form action="{{ route($match->deleted_at? 'matches.force.destroy' : 'matches.destroy', $match->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <td colspan="2"><button class="btn btn-danger" type="submit">Delete</button></td>
                        </form>
                        @else
                        <td><a class="btn btn-primary" href="{{ route('matches.show', $match->id) }}">Details</a></td>
                        @endif
                        <td><a href="{{ route('bet', $match->id) }}"><button class="btn btn-success">Bet</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
