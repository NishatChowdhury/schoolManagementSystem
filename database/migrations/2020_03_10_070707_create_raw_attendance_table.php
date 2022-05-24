<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('registration_id');
            $table->string('access_id')->nullable();
            $table->string('department')->nullable();
            $table->string('unit_id')->nullable();
            $table->string('card')->nullable();
//            $table->integer('sms_sent', 11);
            $table->string('unit_name');
            $table->string('user_name');
            $table->date('access_date')->nullable();
            $table->time('access_time')->nullable();
            $table->integer('processed');
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
        Schema::dropIfExists('raw_attendances');
    }
}
