<?php

namespace App\Http\Controllers;

use App\FeeCategory;
use Illuminate\Http\Request;

class FeeCartController extends Controller
{
    public function store(Request $request)
    {
        $feeCategory = FeeCategory::query()->findOrFail($request->get('category_id'));
        $amount = $request->get('amount');

        // check if fee category exists in session starts
        $fees = $request->session()->get('fees',[]);
        foreach($fees as $fee){
            if(array_search($request->get('category_id'),$fee,true)){
                return view('admin.feeSetup._fee-cart',compact('fees'));
            }
        }
        // check if fee category exists in session ends

        // store fee category in session starts
        $data = [
            'category_id'=>$request->get('category_id'),
            'name'=>$feeCategory->name,
            'amount'=>$amount
        ];
        if($request->session()->has('fees')){
            $request->session()->push('fees',$data);
        }else{
            $request->session()->put(['fees'=>[$data]]);
        }
        // store fee category in session ends

        $fees = $request->session()->get('fees',[]);

        return view('admin.feeSetup._fee-cart',compact('fees'));
    }

    public function destroy(Request $request)
    {
        $request->session()->pull('fees.'.$request->get('key'));

        $fees = $request->session()->get('fees');

        return view('admin.feeSetup._fee-cart',compact('fees'));
    }

    public function flush(Request $request)
    {
        $request->session()->forget('fees');

        $fees = $request->session()->get('fees',[]);

        return view('admin.feeSetup._fee-cart',compact('fees'));
    }

    public function EditFeeCartDestroy(Request $request)
    {
        //dd($request->get('key'));
        $request->session()->pull('fees.'.$request->get('key'));
        $fees = $request->session()->get('fees');
        return view('admin.feeSetup._fee-cart',compact('fees'));
    }
}
