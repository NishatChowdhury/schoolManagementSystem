<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\FeeCategory;
use App\FeePivot;
use App\FeeSetup;
use App\Session;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeeCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $sessions = Session::query()->where('active',1)->pluck('year','id');
        $fee_categories = FeeCategory::all();
        return view('admin.account.fee-category.fee-category',compact('sessions','fee_categories'));
    }

    public function store_fee_category(Request $request){
        $validate = $this->validate($request,[
            'session_id' => 'required',
            'name' => 'required',
            //'description' => 'required'
        ],[
            'name.required'=>'Name Field is Required'
        ]);

        $request['status'] = 1;
        FeeCategory::query()->create($request->all());
        return redirect(route('fee-category.index'))->with('success', 'Fee Category added successfully');
    }

    public function edit_fee_category(Request $request){
        $feeCategory = FeeCategory::findOrFail($request->id);
        return $feeCategory;
    }

    public function update_fee_category(Request $request){
        $feeCategory = FeeCategory::findOrFail($request->id);
        $feeCategory->update($request->all());
        return redirect(route('fee-category.index'))->with('success', 'Fee Category has been Updated');
    }

    public function delete_fee_category($id){
        $category = FeeCategory::findOrFail($id);
        $category->delete();
        return redirect(route('fee-category.index'))->with('success', 'Fee Category has been Deleted');
    }

    public function status($id){

        $category = FeeCategory::find($id);
        if($category->status == 1)
        {
            $category->status = 0;
        }else{
            $category->status = 1;
        }
        $category->save();

        return redirect()->route('fee-category.index')->with('success','Fee Category Status Change Successfully');
    }

//    Fee Setup Start
    public function fee_setup($classId)
    {
        $session = Session::query()->orderBy('id','desc')->first();
        $feeSetups = FeeSetup::query()->where('session_id',$session->id)->where('class_id',$classId)->get(['month']);
        $feeCategories = FeeCategory::query()
            ->where('status',1)
            //->where('session_id',$session->id)
            ->get();

        return view('admin.account.fee-setup.add-fee-setup',compact('feeCategories','feeSetups','classId'));
    }

    public function store_fee_setup(Request $request,$classId)
    {
        $this->validate($request,
            [
                'month' =>'required'
            ],
            [
                'month.required' => 'Select Month'
            ]);

        //$class_id = 1;
        //$session_id = Session::query()->orderBy('id','desc')->first()->id;
        foreach ($request->month as $key=>$value)
        {

            $moth_exist = FeeSetup::query()
                //->where('session_id',$session_id)
                ->where('academic_class_id',$classId)
                ->where('month',$value)
                ->first();

            if(!$moth_exist){
                $feeSetup =  FeeSetup::query()->create([
                    //'session_id'=>$session_id,
                    'academic_class_id'=>$classId,
                    'month' => $value
                ]);
                $thirdCol = [];
                foreach ($request->category_id as $key1=>$category){
                    if ($request->amount[$key1] !=0){
                        $thirdCol[$category] = [ "amount"=>$request->amount[$key1] ];
                    }
                }
                $feeSetup->fee_categories()->attach($thirdCol);
            }else{
                return redirect()->back()->withErrors('Month Fee Setup Already Exits');
            }
        }

        return redirect()->back()->with('success', 'Fee Setup added successfully');

    }

    public function list_fee_setup($classId)
    {
        //$class_id = 1;

        $academicClass = AcademicClass::query()->findOrFail($classId);

        //$session_id = Session::query()->orderBy('id','desc')->first()->id;

        $fee_lists = FeeSetup::query()
            //->where('session_id',$session_id)
            //->where('class_id',$classId)
            ->where('academic_class_id',$classId)
            ->get();
        return view('admin.account.fee-setup.list',compact('fee_lists','academicClass'));
    }

    public function show_fee_setup($id){
        $class_id = 3;
        $data['session'] = Session::query()->orderBy('id','desc')->first();
        $data['feeCategories'] = FeeCategory::query()
            ->where('status',1)
            //->where('session_id',$data['session']->id)
            ->get();
        $data['fee_setup'] = FeeSetup::query()->findOrFail($id);
        return view('admin.account.fee-setup.edit-fee-setup')->with($data);
    }

    public function update_fee_setup(Request $request,$id){
        $fee_setup = FeeSetup::findOrFail($id);

        $thirdCol = [];
        foreach ($request->category_id as $key1=>$category){
            if ($request->amount[$key1] !=0){
                $thirdCol[$category] = [ "amount"=>$request->amount[$key1] ];
            }
        }
        $fee_setup->fee_categories()->sync($thirdCol);

        return redirect(route('fee-setup.list'))->with('success', 'Fee Setup added successfully');


    }




}
