<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name', 100);
            $table->string('father_name', 100);
            $table->string('mother_name', 100);
            $table->date('dob');
            $table->string('contact_number',20);
            $table->string('email', 100);
            $table->string('gender', 10);
            $table->string('blood_group',10)->nullable();
            $table->string('religion', 50);
            $table->string('nationality', 50);
            $table->string('nid', 20)->nullable();
            $table->text('present_address');
            $table->text('permanent_address');
            $table->string('student_photo', 100);
            $table->unsignedInteger('program_id');
            $table->string('certificates')->nullable();
            $table->string('status', 50);
            $table->string('password', 256);
            $table->string('remember_token', 256)->nullable();
            $table->boolean('is_active');
            $table->boolean('is_selected');
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
        Schema::dropIfExists('students');
    }
}
