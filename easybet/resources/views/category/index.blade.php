@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <table class="table table-dark table-striped rounded-bottom">
                    <thead>
                    @if(session()->get('store'))
                        <tr>
                            <th colspan="5">
                                <div class="alert alert-success text-center m-0">
                                    {{ session()->get('store') }}
                                </div>
                            </th>
                        </tr>
                    @elseif(session()->get('update'))
                        <tr>
                            <th colspan="5">
                                <div class="alert alert-success text-center m-0">
                                    {{ session()->get('update') }}
                                </div>
                            </th>
                        </tr>
                    @elseif(session()->get('delete'))
                        <tr>
                            <th colspan="5">
                                <div class="alert alert-danger text-center m-0">
                                    {{ session()->get('delete') }}
                                </div>
                            </th>
                        </tr>
                    @endif
                    <tr>
                        <th scope="col" colspan="3" class="align-middle">Name</th>
                        @if(Auth::user()->admin == 1)
                            <th scope="col" class="align-middle">
                                <a href="{{ route('category.create') }}">
                                    <button class="btn btn-primary">
                                        Create
                                    </button>
                                </a>
                            </th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td class="align-middle">{{ $category->name }}</td>
                            <td class="align-middle">
                                <a href="{{ route('category.show', $category->id) }}">
                                    <button class="btn btn-primary">
                                        Details
                                    </button>
                                </a>
                            </td>
                            @if(Auth::user()->admin == 1)
                                <td class="align-middle">
                                    <a href="{{ route('category.edit', $category->id) }}">
                                        <button class="btn btn-success">
                                            Update
                                        </button>
                                    </a>
                                </td>
                                <td class="align-middle">
                                    <form method="post" action="{{ route('category.destroy', $category->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
