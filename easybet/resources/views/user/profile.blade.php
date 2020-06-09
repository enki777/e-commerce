@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-secondary">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center">Username</th>
                        <th scope="col" class="text-center">Last name</th>
                        <th scope="col" class="text-center">First name</th>
                        <th scope="col" class="text-center">Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center">{{ $user->username }}</td>
                        <td class="text-center">{{ $user->last_name }}</td>
                        <td class="text-center">{{ $user->first_name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                    </tr>
                    </tbody>
                    <thead>
                    <tr>
                        <th class="text-center">Birthday</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">City</th>
                        <th class="text-center">Created at</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center">{{ $user->birthday }}</td>
                        <td class="text-center">{{ $user->address }}</td>
                        <td class="text-center">{{ $user->city }}</td>
                        <td class="text-center"><small class="text-muted">{{ $user->created_at }}</small></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
