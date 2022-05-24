<?php

namespace App\Http\Controllers;

use App\ChartOfAccount;
use App\COA;
use App\CoaGrandParent;
use App\CoaParent;
use App\Repository\FinanceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class ChartOfAccountController extends Controller
{
    /**
     * @var FinanceRepository
     */
    private $repository;

    public function __construct(FinanceRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        //$coa = CoaGrandParent::all();
        //$chartOfAccounts = ChartOfAccount::query()->paginate(50);
        $chartOfAccounts = COA::query()->paginate(50);
        return view('admin.coa.index',compact('chartOfAccounts'));
    }

    public function create()
    {
        $autoCode = COA::query()->max('code') + 1;
        $repository = $this->repository;
        return view('admin.coa.create',compact('repository','autoCode'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:coa',
            'code' => 'required',
            'coa_parents_id' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        //$request['is_active'] = 1;
        $coaParents = CoaParent::query()->findOrFail($request->get('coa_parents_id'));
        $request['coa_grandparents_id'] = $coaParents->coa_grandparents_id;

        ChartOfAccount::query()->create($request->all());

        return redirect('admin/coa');
    }

    public function edit($id)
    {
        $coa = ChartOfAccount::query()->findOrFail($id);

        $repository = $this->repository;

        return view('admin.coa.edit',compact('coa','repository'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required',Rule::unique(ChartOfAccount::class)->ignore($id)],
            'code' => 'required',
            'coa_parents_id' => 'required'
        ]);

        $coa = ChartOfAccount::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        //$request['is_active'] = 1;
        $coaParents = CoaParent::query()->findOrFail($request->get('coa_parents_id'));
        $request['coa_grandparents_id'] = $coaParents->coa_grandparents_id;

        $coa->update($request->all());

        return redirect('admin/coa');
    }

    public function destroy($id)
    {
        $coa = ChartOfAccount::query()->findOrFail($id);

        $coa->delete();

        Session::flash('success','Account head has been deleted!');

        return redirect('admin/coa');
    }

    public function isEnabled(Request $request)
    {
        $id = $request->get('id');
        $coa = ChartOfAccount::query()->findOrFail($id);

        if($coa->is_enabled == 0){
            $coa->update(['is_enabled'=>1]);
        }else{
            $coa->update(['is_enabled'=>0]);
        }
    }
}
