@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Edit Tasks') }}
                    </div>

                    <div class="card-body d-flex justify-content-center flex-column">
                        <form action="/tasks/{{$task->id}}" method="post" class="w-100" id="goals">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="InputGoal">User</label>
                                <div class="d-flex">
                                    <input type="text" name="user" class="form-control rounded" required readonly value="{{$task->goal->user->name}}">
                                </div>
                                <br>
                                <label for="InputGoal">Goal</label>
                                <div class="d-flex">
                                    <input type="text" name="goal" class="form-control rounded" required readonly value="{{$task->goal->goal}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputGoal">Change task #{{$task->id}}</label>
                                <input name="task" required type="text" class="form-control" id="InputGoal" placeholder="Change goal" autocomplete="off" value="{{$task->task}}">
                            </div>
                            <button class="btn btn-success mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
