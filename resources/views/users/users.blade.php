@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    {{ __('Users') }}
                    <a class="btn btn-primary" type="submit" href="/users/create">Add</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Users</th>
                            <th scope="col">Email</th>
                            <th scope="col">Permission</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{ implode(',', $user->permissions->pluck('name')->toArray()) }}</td>
                                <td>
                                    <a href="/users/{{$user->id}}" class="btn btn-outline-success">View</a>
                                    <a href="/users/{{$user->id}}/edit" class="btn btn-outline-primary">Edit</a>
                                    <a href="/users/{{$user->id}}/delete" class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
