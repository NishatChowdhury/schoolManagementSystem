<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('exam_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->date('date')->nullable();
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->integer('objective_full')->nullable();
            $table->integer('objective_pass')->nullable();
            $table->integer('written_full')->nullable();
            $table->integer('written_pass')->nullable();
            $table->integer('practical_full')->nullable();
            $table->integer('practical_pass')->nullable();
            $table->integer('viva_full')->nullable();
            $table->integer('viva_pass')->nullable();

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
        Schema::dropIfExists('exam_schedules');
    }
}
