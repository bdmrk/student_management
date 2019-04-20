<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrolledCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolled_course', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('enroll_id');
            $table->integer('offer_id');
            $table->integer('incourse_mark')->default(0);
            $table->integer('final_mark')->default(0);
            $table->double('cgpa', 3,2)->default(0);
            $table->string('grade', 10)->nullable();
            $table->double('course_fee', 16,2);
            $table->unsignedInteger('teacher_id');
            $table->string('status', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrolled_course');
    }
}
