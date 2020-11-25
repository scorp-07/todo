<?php


namespace App\Http\Controllers\Goals;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Goal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $goals = Goal::with('tasks')->get();
        $statuses = Task::STATUSES;

        return view('goals.goals', ['goals' => $goals, 'statuses' => $statuses]);
    }

    public function create()
    {
        $users = User::all();
        return view('goals.create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'goal' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = User::where('email', $request->email)->firstOrFail();

        Goal::create([
                'user_id' => $user->id,
                'goal' => $request->goal,
                'author_id' => Auth::id(),
            ]);

        return redirect('/goals');
    }

    public function update(Request $request, $goal_id)
    {
        $request->validate([
            'goal' => ['required', 'string'],
            'user' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $goal = Goal::with('tasks')->findOrFail($goal_id);
        $goal->update([
            'goal' => $request->goal,
        ]);

        return redirect('/goals');
    }

    public function edit($goal_id)
    {
        $goal = Goal::with('tasks')->findOrFail($goal_id);

        return view('goals.edit', ['goal' => $goal]);
    }

    public function destroy($goal_id)
    {
        Goal::findOrFail($goal_id)->delete();

        return back();
    }
}
