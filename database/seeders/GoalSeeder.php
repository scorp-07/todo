<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goals')->insert([
            'user_id' => 2,
            'goal' => 'Research the subject.',
            'author_id' => 1
        ]);
        DB::table('goals')->insert([
            'user_id' => 2,
            'goal' => 'Create a list of potential veterans and caregivers to interview in our area.',
            'author_id' => 2
        ]);
        DB::table('goals')->insert([
            'user_id' => 2,
            'goal' => 'Request interviews.',
            'author_id' => 1
        ]);
    }
}
