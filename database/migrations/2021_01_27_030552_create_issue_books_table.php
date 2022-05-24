<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssueBooksTable extends Migration
{

    public function up()
    {
        Schema::create('issue_books', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('book_code');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('issue_books');
    }
}
