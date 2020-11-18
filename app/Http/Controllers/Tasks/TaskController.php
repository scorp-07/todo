<?php


namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Models\Task;

class TaskController extends Controller
{
    public function checked($task_id)
    {
        $k = Task::find($task_id)->is_done;

        switch ($k){
            case 0:
                Task::find($task_id)->update(['is_done' => 1]);
                break;
            case 1:
                Task::find($task_id)->update(['is_done' => 2]);
                break;
        }

        return redirect('/goals');
    }

    public function taskStatus()
    {

    }
}
