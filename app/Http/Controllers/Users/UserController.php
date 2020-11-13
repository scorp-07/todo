<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreate;
use App\Http\Requests\UserUpdate;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::with('permissions')->get();
        return view('users.users', ['users' => $users]);
    }

    public function show($user_id)
    {
        $users = User::find($user_id);

        return view('users.show', ['user' => $users]);
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);

        return view('users.edit', compact('user'));
    }

    public function update(UserUpdate $request, $user_id)
    {
        $user = User::find($user_id);
        $user->update([
            'name' => $request["name"],
            'email' => $request["email"],
            'password' => bcrypt($request["password"])
        ]);
        $user->permissions()->sync($request->permission);

        return redirect('/users/'.$user_id);
    }

    protected function create()
    {
        return view('users.create');
    }

    protected function make(UserCreate $request)
    {
        $req = $request->validated();

        User::create([
            'name' => $req["name"],
            'email' => $req["email"],
            'password' => bcrypt($req["password"])
        ])->permissions()->sync($request->permission);

        return redirect('/users');
    }

    public function destroy($user_id)
    {
        User::find($user_id)->delete();

        return redirect('/users');
    }

}
