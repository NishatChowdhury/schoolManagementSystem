<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OnlineSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('code2');
            $table->string('name');
            $table->integer('type')->comment('1 = compulsory, 2 = selective, 3 = 4th subject');
            $table->unsignedBigInteger('group_id')->nullable();
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
        Schema::dropIfExists('online_subjects');
    }
}
