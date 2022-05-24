<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedNotificationTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notification_types', function (Blueprint $table) {
            $data = ['SMS','APP'];
            foreach($data as $d){
                \App\NotificationType::query()->create(['name'=>$d]);
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
        Schema::table('notification_types', function (Blueprint $table) {
            //
        });
    }
}
