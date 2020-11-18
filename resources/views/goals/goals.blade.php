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

                        <div id="accordion">
                            @foreach($goals as $key => $goal)

                            <div class="card mt-2">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn" data-toggle="collapse" data-target="#collapse{{$goal->id}}" aria-expanded="true" aria-controls="collapse{{$goal->id}}">
                                            {{$goal->goal}}
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapse{{$goal->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                            @foreach($goal->tasks as $task)
                                                <form action="/tasks/checked/{{$task->id}}" method="POST" id="checkForm{{$task->id}}">
                                                    @csrf
                                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                                        <p class="text-justify mb-0">{{$task->task}}</p>
                                                        <p class="text-justify mb-0">{{$task->is_done}}</p>

                                                        <input type="checkbox" name="checkbox" class="checkbox" data-id="checkForm{{$task->id}}">
                                                    </div>
                                                </form>
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

