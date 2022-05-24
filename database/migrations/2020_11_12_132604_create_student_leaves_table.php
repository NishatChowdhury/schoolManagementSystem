<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentLeavesTable extends Migration
{

    public function up()
    {
        Schema::create('student_leaves', function (Blueprint $table) {
            $table->id();
            $table->integer('leaveId');
            $table->string('student_id');
            $table->date('date');
            $table->unsignedBigInteger('leave_purpose_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('student_leaves');
    }
}
