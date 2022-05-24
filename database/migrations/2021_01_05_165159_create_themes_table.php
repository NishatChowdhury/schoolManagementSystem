<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('top_bar_background');
            $table->string('top_bar_color');
            $table->string('header_background');
            $table->string('header_color');
            $table->string('menu_background');
            $table->string('menu_color');
            $table->string('submenu_background');
            $table->string('submenu_color');
            $table->string('inner_background');
            $table->string('inner_color');
            $table->string('footer_background');
            $table->string('footer_color');
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
        Schema::dropIfExists('themes');
    }
}
