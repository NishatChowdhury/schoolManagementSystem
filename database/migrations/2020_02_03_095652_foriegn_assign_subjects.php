<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForiegnAssignSubjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assign_subjects', function (Blueprint $table) {
            //$table->foreign('academic_class_id')->references('id')->on('academic_classes')->onDelete('restrict');
            //$table->foreign('subject_id')->references('id')->on('subjects')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assign_subjects', function (Blueprint $table) {
            //
        });
    }
}
