@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{ __('User') }}
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Email</th>
                                <th scope="col">Permission</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @foreach($user->permissions->pluck('name') as $permission)
                                            <span class="text-primary border border-info rounded p-1">{{$permission}}</span>
                                        @endforeach
                                    </td>
                                    <td class="d-flex">
                                        <a href="/users/{{$user->id}}/edit" class="btn btn-outline-primary mr-1">Edit</a>
                                        <form action="/users/{{$user->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
