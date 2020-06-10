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
                            <p class="text-primary m-0">Players pseudo</p>
                        </th>
                        <th colspan="4"><a href="{{route('players.create')}}"><button class="btn btn-primary float-right mr-4">Create Player</button></a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($players as $player)
                    <tr>
                        <td>{{$player->updated_at}}</td>
                        <td>{{$player->pseudo}}</td>
                        @if($player->deleted_at)
                        <form action="{{ route('players.restore', $player->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <td><button class="btn btn-primary" type="submit">Restore</button></td>
                        </form>
                        @else
                        <td><a class="btn btn-primary" href="{{ route('players.show', $player->id) }}">Details</a></td>
                        @endif
                        @if($player->deleted_at)
                        @else
                        <td><a class="btn btn-success" href="{{ route('players.edit', $player->id) }}">Edit</a></td>
                        @endif
                        <form action="{{ route($player->deleted_at? 'players.force.destroy' : 'players.destroy', $player->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <td colspan="2"><button class="btn btn-danger" type="submit">Delete</button></td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection