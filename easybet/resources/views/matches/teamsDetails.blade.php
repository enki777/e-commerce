@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col--8">
            <table class="table table-dark table-striped rounded-bottom mt-5">
                <!-- <thead> -->
                <tr>
                    <th scope="col" class="align-middle">
                        <p class="text-primary m-0">Players in Team : {{$t1->name}}</p>
                    </th>
                    <th scope="col" class="align-middle">
                        <p class="text-primary m-0">Players in Team : {{$t2->name}}</p>
                    </th>
                    <!-- <th>
                            <a href="{{ route('matches.show', $match) }}">
                                <button class="btn btn-primary float-right mr-4 pl-3 pr-3">Back</button>
                            </a>
                        </th> -->
                </tr>
                <!-- </thead> -->
                <!-- <tbody> -->
                <tr>
                @foreach($t1Players as $player)
                <tr>
                    <td>
                        {{$player->pseudo}}
                    </td>
                </tr>
                @endforeach
                </tr>
                <tr>
                @foreach($t2Players as $player)
                <tr>
                    <td>
                        {{$player->pseudo}}
                    </td>
                </tr>
                @endforeach
                </tr>
                <!-- </tbody> -->
            </table>
        </div>
    </div>
</div>
@endsection