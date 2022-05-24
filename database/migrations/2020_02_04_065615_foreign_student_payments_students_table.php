<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignStudentPaymentsStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_payments', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('restrict');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('restrict');
//            $table->foreign('class_id')->references('id')->on('classes')->onDelete('restrict');
//            $table->foreign('group_id')->references('id')->on('groups')->onDelete('restrict');
//            $table->foreign('section_id')->references('id')->on('sections')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_payments', function (Blueprint $table) {
            //$table->dropColumn(['student_id']);
            //$table->dropColumn(['session_id']);
            //$table->dropColumn(['class_id']);
            //$table->dropColumn(['group_id']);
            //$table->dropColumn(['section_id']);
        });
    }
}
