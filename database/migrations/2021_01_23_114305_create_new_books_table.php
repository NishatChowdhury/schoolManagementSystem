<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewBooksTable extends Migration
{

    public function up()
    {
        Schema::create('new_books', function (Blueprint $table) {
            $table->id();
            $table->string('book_title');
            $table->string('book_code');
            $table->string('author_name');
            $table->string('description');
            $table->unsignedBigInteger('category_id');
            $table->integer('no_of_issue');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('new_books');
    }
}
