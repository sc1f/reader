<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'name' => str_random(10),
            'user_id' => 1,
            'department' => str_random(3),
            'course_code' => "123",
            'instructor' => str_random(5),
            'time' => 'MWF 10-11'
        ]);

        DB::table('courses')->insert([
            'name' => str_random(10),
            'user_id' => 1,
            'department' => str_random(3),
            'course_code' => "123",
            'instructor' => str_random(5),
            'time' => 'MWF 10-11'
        ]);

        DB::table('courses')->insert([
            'name' => str_random(10),
            'user_id' => 1,
            'department' => str_random(3),
            'course_code' => "123",
            'instructor' => str_random(5),
            'time' => 'MWF 10-11'
        ]);
    }
}
