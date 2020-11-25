<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'goal_id' => 1,
            'task' => 'Assign interview teams.',
            'status' => Task::STATUSES['new'],
            'author_id' => 1
        ]);
        DB::table('tasks')->insert([
            'goal_id' => 1,
            'task' => 'Conduct the interviews.',
            'status' => Task::STATUSES['new'],
            'author_id' => 1
        ]);
        DB::table('tasks')->insert([
            'goal_id' => 2,
            'task' => 'Evaluate the results.',
            'status' => Task::STATUSES['new'],
            'author_id' => 2
        ]);
        DB::table('tasks')->insert([
            'goal_id' => 3,
            'task' => 'Create a cohesive “story” for our video.',
            'status' => Task::STATUSES['new'],
            'author_id' => 1
        ]);

    }
}
