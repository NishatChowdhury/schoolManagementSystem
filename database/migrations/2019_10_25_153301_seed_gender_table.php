<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedGenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('genders', function (Blueprint $table) {
            $genders = ['Male','Female','Other'];
            foreach($genders as $gender){
                \App\Gender::query()->create(['name'=>$gender]);
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
        Schema::table('genders', function (Blueprint $table) {
            //
        });
    }
}
