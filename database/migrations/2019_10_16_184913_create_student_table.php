<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('studentId');
            $table->unsignedBigInteger('academic_class_id');
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('section_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->integer('rank')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->string('mobile');
            $table->string('dob')->nullable();
            $table->unsignedBigInteger('blood_group_id')->nullable();
            $table->unsignedBigInteger('religion_id')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('area')->nullable();
            $table->string('zip')->nullable();
            //$table->integer('division_id')->unsigned()->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('email')->nullable();
            $table->string('father_mobile')->nullable();
            $table->string('mother_mobile')->nullable();
            $table->string('ssc_registration')->nullable();
            $table->string('ssc_session')->nullable();
            $table->string('ssc_year')->nullable();
            $table->string('ssc_board')->nullable();
            
            $table->unsignedBigInteger('notification_type_id')->nullable();
            $table->boolean('status');
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
