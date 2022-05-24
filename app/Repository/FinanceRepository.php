<?php


namespace App\Repository;


use App\ChartOfAccount;
use App\CoaParent;

class FinanceRepository
{
    public function parents()
    {
        return CoaParent::all()->pluck('name','id');
    }

    public function coa()
    {
        return ChartOfAccount::all()->pluck('name','id');
    }
}
