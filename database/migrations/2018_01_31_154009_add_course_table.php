<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // add the course table
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); // foreign key
            $table->string('name', 250);
            $table->string('department', 100);
            $table->string('course_code', 100);
            $table->string('instructor', 100);
            $table->string('time', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
