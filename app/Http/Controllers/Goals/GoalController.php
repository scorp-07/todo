<?php


namespace App\Http\Controllers\Goals;

use App\Http\Controllers\Controller;
use App\Models\Goal;
use App\Models\User;

class GoalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $goals = Goal::with('tasks')->get();

        return view('goals.goals', ['goals' => $goals]);
    }

    public function create()
    {
        $users = User::all();
        return view('goals.create', ['users' => $users]);
    }

}
