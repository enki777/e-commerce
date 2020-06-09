@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1 class="float-left">Teams</h1>
                    <a href="{{ route('teams.create') }}"><button class="btn btn-info float-right">Créer une team</button></a>
                </div>

                <div class="card-body">
                    @if(session()->has('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    @foreach($teams as $team)
                    <div class="row m-2">

                        <div class="col-6">
                            <h4>{{$team->name}}</h4>
                        </div>
                        <div class="col-2">
                            @if($team->deleted_at)
                            <form action="{{ route('teams.restore', $team->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-primary" type="submit">Restaurer</button>
                            </form>
                            @else
                            <a class="btn btn-primary" href="{{ route('teams.show', $team->id) }}">Voir</a>
                            @endif
                        </div>
                        <div class="col-2">

                            @if($team->deleted_at)
                            @else
                            <a class="btn btn-warning" href="{{ route('teams.edit', $team->id) }}">Modifier</a>
                            @endif
                        </div>
                        <div class="col-2">
                            <form action="{{ route($team->deleted_at? 'teams.force.destroy' : 'teams.destroy', $team->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="card-footer">
                    {{ $teams->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection