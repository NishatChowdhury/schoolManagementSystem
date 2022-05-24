<?php

use App\Day;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('days', function (Blueprint $table) {
            $days = ['SAT'=>'Saturday','SUN'=>'Sunday','MON'=>'Monday','THU'=>'Thursday','WED'=>'Wednesday','TUE'=>'Tuesday','FRI'=>'Friday'];
            foreach($days as $key => $day){
                Day::query()->create(['name'=>$day,'short_name'=>$key]);
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
        Schema::table('days', function (Blueprint $table) {
            //
        });
    }
}
