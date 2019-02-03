<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('second_name');
           // $table->timestamp('dob')->nullable();
            $table->string('designation');
            $table->string('contact_number');
            $table->string('email');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('address');
            $table->string('teacher_photo');
            $table->tinyInteger('gender');
            $table->tinyInteger('status');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('teachers');
    }
}
