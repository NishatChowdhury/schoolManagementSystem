<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('registration_id');
            $table->string('access_id')->nullable();
            //$table->string('department')->nullable();
            //$table->string('unit_id')->nullable();
            $table->string('card')->nullable();
            $table->string('unit_name');
            //$table->string('user_name');
            //$table->string('access_date');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('staff_id')->nullable();
            $table->date('date');
            $table->time('entry')->nullable();
            $table->time('exit')->nullable();
            $table->time('late');
            $table->time('early');
            $table->string('status');
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
        Schema::dropIfExists('attendances');
    }
}
