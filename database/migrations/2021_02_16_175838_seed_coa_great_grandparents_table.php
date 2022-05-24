<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SeedCoaGreatGrandparentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coa_great_grandparents', function (Blueprint $table) {
            $cats = [
                [
                    'name'=>'Balance Sheet Accounts',
                ],
                [
                    'name'=>'Profit & Loss Accounts',
                ],
            ];
            foreach ($cats as $cat){
                DB::table('coa_great_grandparents')->insert(['name'=>$cat]);
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
        Schema::table('coa_great_grandparents', function (Blueprint $table) {
            //
        });
    }
}
