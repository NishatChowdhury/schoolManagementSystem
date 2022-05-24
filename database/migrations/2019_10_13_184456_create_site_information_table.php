<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('name');
            $table->integer('name_size');
            $table->string('name_font');
            $table->string('name_color');
            $table->string('bn')->nullable();
            $table->integer('bn_size');
            $table->string('bn_font');
            $table->string('bn_color');
            $table->string('address');
            $table->string('institute_code');
            $table->string('eiin');
            $table->string('phone');
            $table->string('email');
            $table->string('logo');
            $table->unsignedBigInteger('theme_id')->default(1);
            $table->boolean('admission_sms')->default(1);
            $table->boolean('admission_confirm_sms')->default(1);

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
        Schema::dropIfExists('site_information');
    }
}
