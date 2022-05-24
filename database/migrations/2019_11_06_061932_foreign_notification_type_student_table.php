<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignNotificationTypeStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notification_type_student', function (Blueprint $table) {
            $table->foreign('notification_type_id')->references('id')->on('notification_types');
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notification_type_student', function (Blueprint $table) {
            $table->dropForeign(['notification_type_id']);
            $table->dropForeign(['student_id']);
        });
    }
}
