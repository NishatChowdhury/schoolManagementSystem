<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignAcademicClasses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('academic_classes', function (Blueprint $table) {
            //$table->foreign('session_id')->references('id')->on('sessions')->onDelete('restrict');
            //$table->foreign('class_id')->references('id')->on('classes')->onDelete('restrict');
            //$table->foreign('group_id')->references('id')->on('groups')->onDelete('restrict');
            //$table->foreign('section_id')->references('id')->on('sections')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('academic_classes', function (Blueprint $table) {
            //
        });
    }
}
