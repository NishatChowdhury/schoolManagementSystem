<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedNoticeCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notice_categories', function (Blueprint $table) {
            $categories = ['School Order','College Order','Office Order'];
            foreach($categories as $category){
                \App\NoticeCategory::query()->create(['name'=>$category]);
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
        Schema::table('notice_categories', function (Blueprint $table) {
            //
        });
    }
}
