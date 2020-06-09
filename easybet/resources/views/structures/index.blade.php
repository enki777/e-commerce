@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-dark table-striped rounded-bottom mt-5">
                <thead>
                    <tr>
                        <th scope="col"><p class="text-primary m-0">Updated at</p></th>
                        <th scope="col"><p class="text-primary m-0">Structure names</p></th>
                        <th colspan="4"><button class="btn btn-primary float-right mr-4">Create Structure</button></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($structures as $structure)
                    <tr>
                        <td>{{$structure->updated_at}}</td>
                        <td>{{$structure->name}}</td>
                        <td><a class="btn btn-primary" href="{{ route('structures.show', $structure->id) }}">Details</a></td>
                        <td><a class="btn btn-success" href="{{ route('structures.edit', $structure->id) }}">Update</a></td>
                        <td><a class="btn btn-danger" href="{{ route('structures.destroy', $structure->id) }}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection