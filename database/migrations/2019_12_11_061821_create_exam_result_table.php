<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('academic_class_id');
            //$table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('exam_id');
            //$table->unsignedBigInteger('class_id');
            //$table->unsignedBigInteger('section_id')->nullable();
            //$table->unsignedBigInteger('group_id')->nullable();
            $table->unsignedBigInteger('student_id');
            $table->integer('total_mark');
            $table->float('gpa',4,2);
            $table->string('grade');
            $table->integer('rank')->nullable();
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
        Schema::dropIfExists('exam_results');
    }
}
