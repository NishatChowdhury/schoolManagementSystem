<?php

use App\COA;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedCoaTable extends Migration
{
    public static $chartOfAccount = array(

        [
            'code' => '120',
            'name' => 'Accounts Receivable',
            'coa_grandparents_id' => 1,
            'coa_parents_id' => 1,
        ],
        [
            'code' => '160',
            'name' => 'Computer Equipment',
            'coa_grandparents_id' => 1,
            'coa_parents_id' => 2,
        ],
        [
            'code' => '150',
            'name' => 'Office Equipment',
            'coa_grandparents_id' => 1,
            'coa_parents_id' => 2,
        ],
        [
            'code' => '140',
            'name' => 'Inventory',
            'coa_grandparents_id' => 1,
            'coa_parents_id' => 3,
        ],
        [
            'code' => '857',
            'name' => 'Budget - Finance Staff',
            'coa_grandparents_id' => 1,
            'coa_parents_id' => 6,
        ],
        [
            'code' => '170',
            'name' => 'Accumulated Depreciation',
            'coa_grandparents_id' => 1,
            'coa_parents_id' => 7,
        ],
        [
            'code' => '200',
            'name' => 'Accounts Payable',
            'coa_grandparents_id' => 2,
            'coa_parents_id' => 8,
        ],
        [
            'code' => '205',
            'name' => 'Accruals',
            'coa_grandparents_id' => 2,
            'coa_parents_id' => 8,
        ],
        [
            'code' => '150',
            'name' => 'Office Equipment',
            'coa_grandparents_id' => 2,
            'coa_parents_id' => 8,
        ],
        [
            'code' => '855',
            'name' => 'Clearing Account',
            'coa_grandparents_id' => 2,
            'coa_parents_id' => 8,
        ],
        [
            'code' => '235',
            'name' => 'Employee Benefits Payable',
            'coa_grandparents_id' => 2,
            'coa_parents_id' => 8,
        ],
        [
            'code' => '236',
            'name' => 'Employee Deductions payable',
            'coa_grandparents_id' => 2,
            'coa_parents_id' => 8,
        ],
        [
            'code' => '255',
            'name' => 'Historical Adjustments',
            'coa_grandparents_id' => 2,
            'coa_parents_id' => 8,
        ],
        [
            'code' => '835',
            'name' => 'Revenue Received in Advance',
            'coa_grandparents_id' => 2,
            'coa_parents_id' => 8,
        ],
        [
            'code' => '260',
            'name' => 'Rounding',
            'coa_grandparents_id' => 2,
            'coa_parents_id' => 8,
        ],
        [
            'code' => '500',
            'name' => 'Costs of Goods Sold',
            'coa_grandparents_id' => 3,
            'coa_parents_id' => 11,
        ],
        [
            'code' => '600',
            'name' => 'Advertising',
            'coa_grandparents_id' => 3,
            'coa_parents_id' => 12,
        ],
        [
            'code' => '644',
            'name' => 'Automobile Expenses',
            'coa_grandparents_id' => 3,
            'coa_parents_id' => 12,
        ],
        [
            'code' => '684',
            'name' => 'Bad Debts',
            'coa_grandparents_id' => 3,
            'coa_parents_id' => 12,
        ],
        [
            'code' => '810',
            'name' => 'Bank Revaluations',
            'coa_grandparents_id' => 3,
            'coa_parents_id' => 12,
        ],
        [
            'code' => '605',
            'name' => 'Bank Service Charges',
            'coa_grandparents_id' => 3,
            'coa_parents_id' => 12,
        ],
        [
            'code' => '615',
            'name' => 'Consulting & Accounting',
            'coa_grandparents_id' => 3,
            'coa_parents_id' => 12,
        ],
        [
            'code' => '700',
            'name' => 'Depreciation',
            'coa_grandparents_id' => 3,
            'coa_parents_id' => 12,
        ],
        [
            'code' => '628',
            'name' => 'General Expenses',
            'coa_grandparents_id' => 3,
            'coa_parents_id' => 12,
        ],
        [
            'code' => '460',
            'name' => 'Interest Income',
            'coa_grandparents_id' => 4,
            'coa_parents_id' => 13,
        ],
        [
            'code' => '470',
            'name' => 'Other Revenue',
            'coa_grandparents_id' => 4,
            'coa_parents_id' => 13,
        ],
        [
            'code' => '475',
            'name' => 'Purchase Discount',
            'coa_grandparents_id' => 4,
            'coa_parents_id' => 13,
        ],
        [
            'code' => '400',
            'name' => 'Sales',
            'coa_grandparents_id' => 4,
            'coa_parents_id' => 13,
        ],
        [
            'code' => '330',
            'name' => 'Common Stock',
            'coa_grandparents_id' => 5,
            'coa_parents_id' => 16,
        ],
        [
            'code' => '300',
            'name' => 'Owners Contribution',
            'coa_grandparents_id' => 5,
            'coa_parents_id' => 16,
        ],
        [
            'code' => '310',
            'name' => 'Owners Draw',
            'coa_grandparents_id' => 5,
            'coa_parents_id' => 16,
        ],
        [
            'code' => '320',
            'name' => 'Retained Earnings',
            'coa_grandparents_id' => 5,
            'coa_parents_id' => 16,
        ],
    );

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coa', function (Blueprint $table) {
            $chartOfAccounts = Self::$chartOfAccount;
            foreach($chartOfAccounts as $account)
            {
                COA::create(
                    [
                        'code' => $account['code'],
                        'name' => $account['name'],
                        'coa_grandparents_id' => $account['coa_grandparents_id'],
                        'coa_parents_id' => $account['coa_parents_id'],
                        'is_enabled' => 1,
                        'created_by' => 1,
                    ]
                );

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
        Schema::table('coa', function (Blueprint $table) {
            //
        });
    }
}
