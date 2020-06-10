@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                            <p class="text-primary m-0">Structure names</p>
                        </th>
                        <th colspan="4"><a href="{{route('structures.create')}}"><button class="btn btn-primary float-right mr-4">Create Structure</button></a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($structures as $structure)
                    <tr>
                        <td>{{$structure->updated_at}}</td>
                        <td>{{$structure->name}}</td>
                        @if($structure->deleted_at)
                        <form action="{{ route('structures.restore', $structure->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <td colspan="2"><button class="btn btn-primary" type="submit">Restore</button></td>
                        </form>
                        @else
                        <td><a class="btn btn-primary" href="{{ route('structures.show', $structure->id) }}">Details</a></td>
                        @endif
                        @if($structure->deleted_at)
                        @else
                        <td><a class="btn btn-success" href="{{ route('structures.edit', $structure->id) }}">Edit</a></td>
                        @endif
                        <form action="{{ route($structure->deleted_at? 'structures.force.destroy' : 'structures.destroy', $structure->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <td><button class="btn btn-danger" type="submit">Delete</button></td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection