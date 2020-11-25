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

                        <div class="d-flex align-items-center justify-content-between">
                            <span class="title_accordion h5 text-bold">Goals</span>
                            <a href="/goals/create" class="btn btn-primary">Add</a>
                        </div>
                        <div id="accordion">
                            @foreach($goals as $key => $goal)

                                <div class="card mt-2">
                                    <div class="card-header d-flex justify-content-between" id="headingOne">

                                        <div class="mb-0">
                                            <span class="mt-auto mb-auto">{{$goal->id}}</span>
                                            <button class="btn" data-toggle="collapse" data-target="#collapse{{$goal->id}}" aria-expanded="true" aria-controls="collapse{{$goal->id}}">
                                                {{$goal->goal}}
                                            </button>
                                        </div>
                                        <div class="d-flex">
                                            <a href="/goals/{{$goal->id}}/edit" class="btn btn-light text-primary mr-1">Edit</a>
                                            <form action="/goals/{{$goal->id}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-light text-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>

                                    <div id="collapse{{$goal->id}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            @foreach($goal->tasks as $task)
                                                    @csrf
                                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                                        <p class="text-justify mb-0">{{$task->task}}</p>
                                                        <p class="text-justify mb-0">{{$task->author->name}}</p>
                                                        <p class="text-justify mb-0">{{$task->status}}</p>
                                                        <div class="d-flex">
                                                            <a href="/tasks/{{$task->id}}/edit" class="btn btn-light text-primary mr-1">Edit</a>
                                                            <form action="/tasks/{{$task->id}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-light text-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
