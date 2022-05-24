<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignFeePivotFeeCategoryFeeSetupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fee_pivots', function (Blueprint $table) {
            $table->foreign('fee_setup_id')->references('id')->on('fee_setups')->onDelete('cascade');
            $table->foreign('fee_category_id')->references('id')->on('fee_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fee_pivots', function (Blueprint $table) {
            $table->dropForeign(['fee_setup_id']);
            $table->dropForeign(['fee_category_id']);
        });
    }
}
