<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,10) as $i) {
            DB::table('lessons')->insert([
                'name' => 'lesson ' . $i,
            ]);
        }

    }
}
