<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignStudentPaymentsStuPaymentPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_pivots', function (Blueprint $table) {
            $table->foreign('stu_payment_id')->references('id')->on('student_payments')->onDelete('restrict');
            $table->foreign('category_id')->references('id')->on('fee_categories')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_pivots', function (Blueprint $table) {
            //$table->dropColumn(['stu_payment_id']);
            //$table->dropColumn(['category_id']);
        });
    }
}
