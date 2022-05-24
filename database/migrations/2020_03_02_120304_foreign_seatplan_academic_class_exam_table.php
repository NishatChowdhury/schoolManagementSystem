<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignSeatplanAcademicClassExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exam_seat_plans', function (Blueprint $table) {
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('restrict');
            $table->foreign('academic_class_id')->references('id')->on('academic_classes')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exam_seat_plans', function (Blueprint $table) {
            //$table->dropForeign('exam_id');
            //$table->dropForeign('academic_class_id');
        });
    }
}
