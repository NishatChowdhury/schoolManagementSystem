<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignSyllabusAcademicClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('syllabus', function (Blueprint $table) {
            $table->foreign('academic_class_id')->references('id')->on('academic_classes')->onDelete('restrict');
            //$table->foreign('session_id')->references('id')->on('sessions')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('syllabus', function (Blueprint $table) {
            //$table->dropColumn(['academic_class_id']);
            //$table->dropColumn(['session_id']);
        });
    }
}
