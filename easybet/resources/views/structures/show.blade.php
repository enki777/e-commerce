@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-dark table-striped rounded-bottom mt-5">
                <thead>
                    <tr>
                        <th scope="col"><p class="text-primary m-0">{{$structure->name}}'s Teams</p></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($teams as $team)
                    <tr>
                        <td>{{$team->name}}</td>
                        <td><a class="btn btn-primary" href="{{ route('teams.show', $team->id) }}">Details</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection