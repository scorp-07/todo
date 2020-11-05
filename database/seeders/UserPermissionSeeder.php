<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_permission')->insert([
            'user_id' => 1,
            'permission_id' => 1
        ]);
        DB::table('user_permission')->insert([
            'user_id' => 2,
            'permission_id' => 2
        ]);
    }
}
