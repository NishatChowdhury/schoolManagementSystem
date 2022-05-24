<?php

namespace App\Http\Controllers;

use App\COA;
use App\CoaParent;
use App\CoaGrandparent;
use App\Journal;
use App\JournalItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountingController extends Controller
{
    function balance_sheet(){
        $coaGrandParent = CoaGrandParent::all();
        $revenue_coas = CoaParent::whereName('Revenue')->first()->children;
        $expense_coas = CoaParent::whereName('Expense')->first()->children;
        // return $coaGrandParent->first()->children->first()->children;
        return view('admin.reports.balance_sheet', compact('coaGrandParent','revenue_coas','expense_coas'));
    }

    public function ledger(Request $request)
    {
        $this->validate($request,[
            'start_date' => 'date',
            'end_date' => 'date'
        ]);

        $coa = COA::all()->pluck('name','id');
        $acc = collect();
        //$account = 'Account Name';

        if($request->has('start_date') && $request->has('end_date') && $request->has('account')){
            $start = $request->get('start_date');
            $end = $request->get('end_date');

//            $heads = COA::query()
//                ->whereHas('items',function($query)use($start,$end){
//                    $query->whereHas('journal',function($q)use($start,$end){
//                        $q->whereBetween('date',[$start,$end]);
//                    });
//                });
//
//            if($request->has('account') && $request->get('account') !== null){
//                $heads->where('id',$request->get('account'));
//            }
//
//            $acc = $heads->get();

            $heads = JournalItem::query()
                ->whereHas('journal',function($query)use($request){
                    $query->whereBetween('date',[$request->get('start_date'),$request->get('end_date')]);
                });
                //->where('coa_id',$request->get('account'));

            if($request->has('account') && $request->get('account') !== null){
                $heads->where('coa_id',$request->get('account'));
            };

            $acc = $heads->get()->groupBy('coa_id');
//
//            $account = COA::query()->findOrFail($request->get('account'))->name;
        }

        return view('admin.accounting.ledger',compact('coa','acc'));
    }

    public function trialBalance(Request $request)
    {
        $start = $request->get('start_date');
        $end = $request->get('end_date');
        $accounts = JournalItem::query()
            ->whereHas('journal',function($query)use($request){
                $query->whereBetween('date',[$request->get('start_date'),$request->get('end_date')]);
            })->whereHas('coa',function($query){
                $query->where('is_enabled',1);
            })
            ->get()
            ->groupBy('coa_id');

        $accounts = COA::query()
            ->whereHas('items',function($query)use($start,$end){
                $query->whereHas('journal',function($query)use($start,$end){
                    $query->whereBetween('date',[$start,$end]);
                });
            })
            ->get();


        return view('admin.accounting.trial-balance',compact('accounts','start','end'));
    }

    public function profitNLoss(Request $request)
    {
        $start = $request->get('start_date');
        $end = $request->get('end_date');

        $expenses = CoaGrandparent::query()->findOrFail(3);
        $incomes = CoaGrandparent::query()->findOrFail(4);

        return view('admin.accounting.profit-n-loss',compact('incomes','expenses','start','end'));
    }

    public function balanceSheet(Request $request)
    {
        $start = $request->get('start_date');
        $end = $request->get('end_date');

        $assets = CoaGrandparent::query()->findOrFail(1);
        $liabilities = CoaGrandparent::query()->findOrFail(2);
        $equities = CoaGrandparent::query()->findOrFail(5);

        return view('admin.accounting.balance-sheet',compact('start','end','assets','liabilities','equities'));
    }

}
