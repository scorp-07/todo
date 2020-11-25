@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Add Goals') }}
                    </div>

                    <div class="card-body d-flex justify-content-center flex-column">
                        <form action="/goals/store" method="post" class="w-100" id="goals">
                            @csrf
                            <div class="form-group">
                                <label for="InputGoal">Select user</label>
                                <div class="d-flex">
                                    <input id="editing_page" required class="form-control border mr-2 rounded" list="editing_page_list" name="email" placeholder="Select user" autocomplete="off"/>
                                    <datalist id="editing_page_list">
                                        @foreach($users as $user)
                                            <option>{{$user->email}}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputGoal">Enter goal</label>
                                <input name="goal" required type="text" class="form-control" id="InputGoal" placeholder="Enter goal" autocomplete="off">
                            </div>

                            <button class="btn btn-success mt-3">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection