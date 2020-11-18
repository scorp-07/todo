@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Add Goals') }}
                    </div>

                    <div class="card-body d-flex justify-content-center">
                        <form method="post" class="w-100" id="goals">
                            @csrf
                            <div class="form-group">
                                <label for="InputGoal">Select user</label>
                                <div class="d-flex">
                                    <input id="editing_page" class="form-control border mr-2 rounded" list="editing_page_list" placeholder="Select user"/>
                                    <datalist id="editing_page_list">
                                        @foreach($users as $user)
                                            <option>{{$user->email}}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputGoal">Enter goal</label>
                                <input type="text" class="form-control" id="InputGoal" placeholder="Enter goal">
                            </div>
                            <div class="form-group">
                                <label for="InputTask">Enter task</label>
                                <div class="d-flex">
                                    <input type="text" class="form-control border mr-2 rounded" id="InputTask" placeholder="Enter task">
                                    <button id="add_task" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                            <div class="lists " id="lists">
                                <input type="text" name="tasks[]" class="form-control" id="tasks" readonly value="Lorem ipsum dolor sit amet.">
                                <input type="text" name="tasks[]" class="form-control" id="tasks" readonly value="Lorem ipsum dolor sit amet.">
                            </div>

                            <button class="btn btn-success mt-3">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
