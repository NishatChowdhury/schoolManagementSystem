<?php

use App\Religion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedReligionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('religions', function (Blueprint $table) {
            $religions = ['Islam','Hinduism','Buddhism','Christianity','Other'];
            foreach($religions as $religion){
                Religion::query()->create(['name'=>$religion]);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('religions', function (Blueprint $table) {
            //
        });
    }
}
