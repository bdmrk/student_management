<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->string('examination', 100)->nullable();
            $table->string('board', 100)->nullable();
            $table->string('institute', 100)->nullable();
            $table->string('roll_no', 100)->nullable();
            $table->string('result', 100)->nullable();
            $table->string('subject', 100)->nullable();
            $table->string('group', 100)->nullable();
            $table->string('passing_year', 100)->nullable();
            $table->string('course_duration', 100)->nullable();
            $table->integer('crated_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('academic_informations');
    }
}
