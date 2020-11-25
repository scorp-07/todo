@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Add Tasks') }}
                    </div>

                    <div class="card-body d-flex justify-content-center flex-column">
                        <form action="/tasks" method="POST" class="w-100" id="goals">
                            @csrf
                            <div class="form-group">
                                <label for="InputGoal">Select user</label>
                                <div class="d-flex">
                                    <input id="editing_page" required class="form-control border mr-2 rounded" list="editing_page_list" name="goal" placeholder="Select user" autocomplete="off"/>
                                    <datalist id="editing_page_list">
                                        @foreach($goals as $goal)
                                            <option value="{{$goal->goal}}"></option>
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="InputTask">Enter task</label>
                                <div class="d-flex">
                                    <input type="text" id="task_input" placeholder="Enter task" class="form-control rounded" autocomplete="off">
                                    <button id="add_task" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                            <div class="lists" id="lists">
                            </div>

                            <button class="btn btn-success mt-3">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
