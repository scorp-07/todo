<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Models\Goal;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function store(Request $request)
    {
        /*
         * TODO Validation
         * */

        $request->validate([
            'goal' => ['required', 'string'],
            'tasks.*' => ['required', 'string']
        ]);
        $goal = Goal::where('goal', $request->goal)->first();
        $tasks = [];

        foreach ($request->tasks as $task) {
            $tasks[] = [
                'goal_id' => $goal->id,
                'task' => $task,
                'status' => 'new',
                'author_id' => Auth::id(),
            ];
        }
        $goal->tasks()->createMany($tasks);

        return back();
    }

    public function create()
    {
        $goals = Goal::all();
        return view('tasks.create', ['goals' => $goals]);
    }

    public function edit($task_id)
    {
        $task = Task::findOrFail($task_id);
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Request $request, $task_id)
    {
        $task = Task::findOrFail($task_id);

        if ($request->has('status')) {

            $request->validate([
                'status' => ['required', 'max:255', 'string'],
            ]);

            $task->update([
                'status' => $request->status,
            ]);

        }elseif ($request->has('task')){

            $request->validate([
                'task' => ['required', 'string'],
            ]);

            $task->update([
                'task' => $request->task,
            ]);
        }

        return back();
    }

    public function destroy($task_id)
    {
        Task::findOrFail($task_id)->delete();
        return back();
    }
}
