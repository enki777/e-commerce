@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5 bg-dark">
                <div class="card-header">
                    <h1 class="float-left text-white">Teams</h1>
                    @if(Auth::user()->admin == 1)
                    <a href="{{ route('teams.create') }}"><button class="btn btn-info float-right">Create team</button></a>
                    @endif
                </div>

                <div class="card-body">
                    @if(session()->has('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    @foreach($teams as $team)
                    <div class="row m-2">
                        <div class="col-6 text-primary">
                            <h4>{{$team->name}}</h4>
                        </div>
                        @if(Auth::user()->admin == 1)
                        <div class="col-2">
                            @if($team->deleted_at)
                            <form action="{{ route('teams.restore', $team->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-primary" type="submit">Restore</button>
                            </form>
                            @else
                            <a class="btn btn-primary" href="{{ route('teams.show', $team->id) }}">Details</a>
                            @endif
                        </div>
                        <div class="col-2">

                            @if($team->deleted_at)
                            @else
                            <a class="btn btn-warning" href="{{ route('teams.edit', $team->id) }}">Edit</a>
                            @endif
                        </div>
                        <div class="col-2">
                            <form action="{{ route($team->deleted_at? 'teams.force.destroy' : 'teams.destroy', $team->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                        </div>
                        @else
                        <div class="col-8">
                            <h4>{{$team->name}}</h4>
                        </div>
                        <div class="col-4">
                            <a class="btn btn-primary" href="{{ route('teams.show', $team->id) }}">Details</a>
                        </div>
                        @endif
                    </div>
                    @endforeach

                </div>
                <div class="card-footer d-flex justify-content-center pt-4">
                    {{ $teams->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection