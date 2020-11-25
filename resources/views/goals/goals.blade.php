@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{ __('Goals') }}
                    </div>
                    <div class="card-body">
                        @foreach($goals as $key => $goal)
                        <div id="accordion">

                            <div class="card mt-2">
                                <div class="card-header d-flex justify-content-between" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn" data-toggle="collapse" data-target="#collapse{{$goal->id}}" aria-expanded="true" aria-controls="collapse{{$goal->id}}">
                                            {{$goal->goal}}
                                        </button>
                                    </h5>
                                    <p class="text-justify mb-0">{{$goal->author->name}}</p>
                                </div>

                                <div id="collapse{{$goal->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                            @foreach($goal->tasks as $task)
                                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                                        <p class="text-justify mb-0 d-flex flex-column">
                                                            <span>{{$task->task}}</span>
                                                            <span class="text-secondary">Автор: {{$task->author->name}}</span>
                                                        </p>

                                                        <div class="dropdown">
                                                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Status
                                                            </button>
                                                            <ul class="dropdown-menu checkbox-menu allow-focus">
                                                                <form action="/tasks/{{$task->id}}" method="POST" id="checkForm{{$task->id}}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    @foreach($statuses as $key => $status)
                                                                        <li class="d-flex justify-content-between align-items-center p-2">
                                                                            <div class="d-inline">
                                                                                <input type="radio" name="status" class="checkbox" value="{{$key}}" data-id="checkForm{{$task->id}}" id="{{$key}}{{$task->id}}" {{($key === $task->status) ? 'checked' : ''}}>
                                                                                <label for="{{$key}}{{$task->id}}">{{$status}}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </form>
                                                            </ul>
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
