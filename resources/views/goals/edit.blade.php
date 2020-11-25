@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Edit Goals') }}
                    </div>

                    <div class="card-body d-flex justify-content-center flex-column">
                        <form action="/goals/{{$goal->id}}" method="post" class="w-100" id="goals">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="InputGoal">User</label>
                                <div class="d-flex">
                                    <input type="text" name="user" class="form-control rounded" required readonly value="{{$goal->user->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputGoal">Change goal</label>
                                <input name="goal" required type="text" class="form-control" id="InputGoal" placeholder="Change goal" autocomplete="off" value="{{$goal->goal}}">
                            </div>
                            <button class="btn btn-success mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
