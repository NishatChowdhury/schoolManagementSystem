<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedNoticeTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notice_types', function (Blueprint $table) {
            $data = ['News','Notice'];
            foreach($data as $d){
                \App\NoticeType::query()->create(['name'=>$d]);
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
        Schema::table('notice_types', function (Blueprint $table) {
            //
        });
    }
}
