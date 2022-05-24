<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliedStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applied_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('group_id');
            $table->string('studentId');
            $table->string('ssc_roll');
            $table->string('name');
            $table->unsignedBigInteger('gender_id');
            $table->date('dob');
            $table->string('brcn');
            $table->unsignedBigInteger('blood_group_id');
            $table->unsignedBigInteger('religion_id');
            $table->unsignedBigInteger('preferred_group');
            $table->string('marital_status');
            $table->string('nid');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->string('father');
            $table->string('mother');
            $table->string('guardian_name');
            $table->string('father_occupation');
            $table->string('relation_with_guardian');
            $table->integer('yearly_income');
            $table->string('total_member');
            $table->string('guardian_nid');
            $table->string('mobile');
            $table->string('email');
            $table->string('cocurricular');
            $table->string('hobby');
            $table->string('quota');
            $table->string('guardian_mobile');
            $table->string('pre_house_number');
            $table->string('pre_village');
            $table->string('pre_road');
            $table->string('pre_post_office');
            $table->string('pre_post_code');
            $table->string('pre_thana');
            $table->string('pre_district');
            $table->string('per_house_number');
            $table->string('per_village');
            $table->string('per_road');
            $table->string('per_post_office');
            $table->string('per_post_code');
            $table->string('per_thana');
            $table->string('per_district');
            $table->string('ssc_board');
            $table->string('ssc_year');
            //$table->text('ssc_roll');
            $table->string('ssc_registration');
            $table->string('ssc_session');
            $table->string('student_type');
            $table->string('ssc_gpa');
            $table->string('ssc_group');
            $table->string('ssc_school');
            $table->string('image')->nullable();
            $table->text('subjects')->nullable();
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
        Schema::dropIfExists('applied_students');
    }
}
