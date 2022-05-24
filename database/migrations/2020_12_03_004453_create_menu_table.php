<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->string('name');
            $table->string('uri')->nullable();
            $table->integer('type');
            $table->unsignedBigInteger('page_id')->nullable();
            $table->string('system_page')->nullable();
            $table->string('url')->nullable();
            $table->integer('order');
            $table->boolean('editable')->default(1);
            $table->boolean('deletable')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
