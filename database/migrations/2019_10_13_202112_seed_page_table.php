<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $pages = ['introduction','governing body','founder & donor','president message','principal message','building & rooms','library','transport','hotel','class routine','calendar','syllabus','performance','managing committee','teachers','staff'];
            foreach($pages as $page){
                $data['name'] = $page;
                $data['content'] = '';
                $data['image'] = '';
                $data['order'] = 0;
                \App\Page::query()->create($data);
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
        Schema::table('pages', function (Blueprint $table) {
            //
        });
    }
}
