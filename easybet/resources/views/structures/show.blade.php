@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-dark table-striped rounded-bottom mt-5">
                <thead>
                    <tr>
                        <th scope="col">
                            <p class="text-primary m-0">{{$structure->name}}'s Teams</p>
                        </th>
                        <th>
                            <a href="{{ route('structures.index') }}">
                                <button class="btn btn-primary float-right mr-4 pl-3 pr-3">Back</button>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teams as $team)
                    <tr>
                        <td>{{$team->name}}</td>
                        <td><a class="btn btn-info float-right mr-4" href="{{ route('teams.show', $team->id) }}">Details</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection