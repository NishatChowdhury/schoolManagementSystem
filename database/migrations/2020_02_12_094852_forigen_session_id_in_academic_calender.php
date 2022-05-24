<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForigenSessionIdInAcademicCalender extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('academic_calenders', function (Blueprint $table) {
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('academic_calenders', function (Blueprint $table) {
            //$table->dropForeign('session_id');
        });
    }
}
