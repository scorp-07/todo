@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{ __('Edit user') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="/users/{{ $user->id }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" autocomplete="off" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" autocomplete="off" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">
                                    Permission
                                </label>
                                <div class="form-group col-md-6 d-flex flex-column">
                                    <div class="col-md-6">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="permission[]" {{ ($user->permissions->pluck('id')[0] === 1) ? 'checked' : '' }} value="1">
                                        <label class="form-check-label" for="gridCheck1">
                                            Admin
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-check-input" type="checkbox" id="gridCheck2" name="permission[]" {{ (isset($user->permissions->pluck('id')[1]) == 2 ? 'checked' : ($user->permissions->pluck('id')[0]) == 2) ? 'checked' : '' }} value="2">
                                        <label class="form-check-label" for="gridCheck2">
                                            User
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
