<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedSocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('socials', function (Blueprint $table) {
            \App\Social::create([
                'facebook'  => 'https://www.facebook.com/',
                'youtube'   => 'https://www.youtube.com/',
                'twitter'   => 'https://twitter.com/',
                'linkendin' => 'https://bd.linkedin.com/',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('socials', function (Blueprint $table) {
            //
        });
    }
}
