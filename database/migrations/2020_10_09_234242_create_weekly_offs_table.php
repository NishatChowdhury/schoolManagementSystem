<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeklyOffsTable extends Migration
{
    public function up()
    {
        Schema::create('weekly_offs', function (Blueprint $table) {
            $table->id();
            $table->string('show_option')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('weekly_offs');
    }
}
