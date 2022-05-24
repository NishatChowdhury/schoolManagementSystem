<?php

namespace App\Http\Controllers;

use App\FeeSetup;
use App\PaymentPivot;
use App\Student;
use App\StudentPayment;
use App\Transport;
use Illuminate\Http\Request;
use App\Repository\StudentRepository;

class FinanceController extends Controller
{
    private $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $student = Student::query()->where('studentId',$request->studentId)->first();
        if($student){
            $fee_setup = FeeSetup::query()
                //->where('class_id',$student->class_id)
                //->where('session_id',$student->session_id)
                ->where('academic_class_id',$student->academic_class_id)
                ->where('month',$request->month)
                ->first();
            $transport_fee = Transport::query()->where('student_id',$student->id)->where('status',1)->first();
            $payment_details = StudentPayment::query()->where('student_id',$student->id)->orderBy('created_at')->get();
        }else{
            $fee_setup =[];
            $transport_fee =[];
            $payment_details =[];
        }
        return view('admin.account.fee-collection.student-fee',compact('student','fee_setup','transport_fee','payment_details'));
    }

    public function store_payment(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'paid_amount' => 'required'
        ],[

        ]);
        $data['setup_amount']   = $request->fee_amount;
        $data['student_id']     = $request->student_id;
        $data['class_id']     = $request->class_id;
        $data['section_id']     = $request->section_id;
        $data['group_id']     = $request->group_id;
        $data['session_id']     = $request->session_id;
        $data['month']     = $request->month;
        $data['discount']     = $request->discount;
        $data['fine']     = $request->fine;
        $data['arrears']     = $request->arrears;
        $data['due']     = $request->due;
        $data['paid_amount']     = $request->paid_amount;
        $data['transport']     = $request->transport;
        $student_payment = StudentPayment::create($data);

        foreach ($request->category_id as $key=>$category){
            if ($request->amount[$key] !=0){
                PaymentPivot::create([
                    'stu_payment_id'    =>$student_payment->id,
                    'category_id'       =>$request->category_id[$key],
                    'amount'            =>$request->amount[$key]
                ]);
            }
        }
        $route = route('student.fee-invoice',$student_payment->id);
        session()->flash('invoice',$route);
        return redirect()->route('student.fee');

    }

    public function fee_invoice($id)
    {
        $data['student_id'] = StudentPayment::findOrfail($id);
        $data['students']   = $data['student_id']->student;
        $data['categories'] = PaymentPivot::query()->where('stu_payment_id',$id)->get();

       return view('admin.account.fee-collection.fee-invoice')->with($data);
    }


}
