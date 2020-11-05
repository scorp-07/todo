<?php

namespace Database\Seeders;

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
            'is_done' => 0
        ]);
        DB::table('tasks')->insert([
            'goal_id' => 1,
            'task' => 'Conduct the interviews.',
            'is_done' => 0
        ]);
        DB::table('tasks')->insert([
            'goal_id' => 2,
            'task' => 'Evaluate the results.',
            'is_done' => 0
        ]);
        DB::table('tasks')->insert([
            'goal_id' => 3,
            'task' => 'Create a cohesive “story” for our video.',
            'is_done' => 0
        ]);

    }
}
