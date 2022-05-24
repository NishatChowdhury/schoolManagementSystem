<?php

use App\CoaGrandparent;
use App\CoaParent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedCoaParentsTable extends Migration
{
    public static $chartOfAccountType = [
        'assets' => 'Assets',
        'liabilities' => 'Liabilities',
        'expenses' => 'Expenses',
        'income' => 'Income',
        'equity' => 'Equity',
    ];

    public static $chartOfAccountSubType = array(
        "assets" => array(
            '1' => 'Current Asset',
            '2' => 'Fixed Asset',
            '3' => 'Inventory',
            '4' => 'Non-current Asset',
            '5' => 'Prepayment',
            '6' => 'Bank & Cash',
            '7' => 'Depreciation',
        ),
        "liabilities" => array(
            '1' => 'Current Liability',
            '2' => 'Liability',
            '3' => 'Non-current Liability',
        ),
        "expenses" => array(
            '1' => 'Direct Costs',
            '2' => 'Expense',
        ),
        "income" => array(
            '1' => 'Revenue',
            '2' => 'Sales',
            '3' => 'Other Income',
        ),
        "equity" => array(
            '1' => 'Equity',
        ),

    );

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coa_parents', function (Blueprint $table) {

            $chartOfAccountTypes = Self::$chartOfAccountType;
            foreach($chartOfAccountTypes as $k => $type)
            {
                $accountType = CoaGrandparent::create(
                    [
                        'name' => $type,
                        'coa_great_grandparents_id' => 1,
                        'created_by' => 1,
                    ]
                );

                $chartOfAccountSubTypes = Self::$chartOfAccountSubType;

                foreach($chartOfAccountSubTypes[$k] as $subType)
                {
                    CoaParent::create(
                        [
                            'name' => $subType,
                            'coa_grandparents_id' => $accountType->id,
                        ]
                    );
                }
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
        Schema::table('coa_parents', function (Blueprint $table) {
            //
        });
    }
}
