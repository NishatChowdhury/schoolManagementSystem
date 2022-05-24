<?php

namespace App\Http\Controllers;

use App\FeeSetup;
use Illuminate\Http\Request;
use App\Student;
use App\StudentPayment;
use Illuminate\Support\Facades\DB;

class FeeCollectionController extends Controller
{
    public function index(){
        return view('admin.feeCollection.index');
    }

    public function view(Request $request){
        $user = auth()->user();
        $payment_method = DB::table('payment_methods')->pluck('name');
        $term = $request->term;
        $student = Student::query()->where('studentId',$term)->first();

        if(!empty($student->studentId) && $student->studentId == $term){
            $feeSetup = $student->feeSetup;
            return view('admin.feeCollection.view',compact('student','feeSetup','term','payment_method','user'));
        }
        else{
            return view('admin.feeCollection.index')->with('message', 'IT WORKS!');
        }
    }

    public function store(Request $request){
        StudentPayment::query()->create($request->all());
        return redirect('admin/fee/fee-collection')->with('message','Added Successfully!');
    }

    public function allCollections(){
        $studentPayment = StudentPayment::all();
        return view('admin.feeCollection.collection',compact('studentPayment'));
    }

    public function report($id){
        $student = Student::query()->where('id',$id)->first();
        if($student){
            $fee_setup = FeeSetup::query()
                ->where('academic_class_id',$student->academic_class_id)->with('feeSetupPivot')
                ->first();
            $payment_details = StudentPayment::query()
                ->where('student_id',$student->id)
                ->orderBy('created_at')
                ->get();
                //dd($payment_details);
        }else{
            $fee_setup =[];
            $transport_fee =[];
            $payment_details =[];
        }
        return view('admin.feeCollection.report',compact('student','fee_setup','payment_details'));
    }

}
