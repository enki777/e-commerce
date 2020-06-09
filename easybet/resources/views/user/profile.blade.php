@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">

                <table class="table table-striped table-dark rounded-bottom">
                    <thead>
                    @if(session()->get('verify'))
                        <tr>
                            <th colspan="4">
                                <div class="alert alert-info text-center m-0">
                                    <p class="m-0">{{ session()->get('verify') }}</p>
                                    <span>If you didn't receive any email click <a href="#"
                                                                                   onclick="event.preventDefault();
                                                                       document.getElementById('form-email').submit();">
                                <u>here</u></a>.</span>
                                    <form method="post" action="{{ route('user.verify') }}" id="form-email"
                                          class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </th>
                        </tr>
                    @endif
                    <tr>
                        <th scope="col" class="text-center">Username</th>
                        <th scope="col" class="text-center">First name</th>
                        <th scope="col" class="text-center">Last name</th>
                        <th scope="col" class="text-center">Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center">{{ $user->username }}</td>
                        <td class="text-center">{{ $user->first_name }}</td>
                        <td class="text-center">{{ $user->last_name }}</td>
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
                        <td class="text-center">{{ $user->created_at }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <a href="{{ route('user.edit') }}">
                                <button class="btn btn-primary">Edit my profile</button>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('user.edit-password') }}">
                                <button class="btn btn-primary">Change my password</button>
                            </a>
                        </td>
                        <td></td>
                        <td class="text-center">
                            <a href="{{ route('user.delete') }}">
                                <button class="btn btn-danger">Delete my account</button>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
