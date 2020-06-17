@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 p-0">
            <table class="table table-dark table-striped rounded-bottom mt-5">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle">
                            <p class="text-primary m-0">Players in Team : {{$t1->name}}</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($t1Players as $player)
                    <tr>
                        <td colspan="2">
                            <p>{{$player->pseudo}}</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-6 p-0">
            <table class="table table-dark table-striped rounded-bottom mt-5">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle">
                            <p class="text-primary m-0">Players in Team : {{$t2->name}}</p>
                        </th>
                        <th>
                        <a href="{{ route('matches.show', $match) }}" class="btn btn-primary float-right pb-0 pt-0">Back</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($t2Players as $player)
                    <tr>
                        <td colspan="2">
                            <p>{{$player->pseudo}}</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection