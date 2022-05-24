<?php

namespace App\Http\Controllers;

use App\FeePivot;
use App\FeeSetup;
use App\Student;
use App\StudentPayment;
use Illuminate\Http\Request;
use App\Repository\StudentRepository;

class ReportController extends Controller
{
    private $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function student_fee_report(Request $request, Student $student)
    {

        if($request->all()){
            $s = $student->newQuery()->whereIn('session_id',activeYear());
            if($request->get('studentId')){
                $studentId = $request->get('studentId');
                $s->where('studentId',$studentId);
            }
            if($request->get('name')){
                $name = $request->get('name');
                $s->where('name','like','%'.$name.'%');
            }
            if($request->get('class_id')){
                $class = $request->get('class_id');
                $s->where('class_id',$class);
            }
            if($request->get('section_id')){
                $section = $request->get('section_id');
                $s->where('section_id',$section);
            }
            if($request->get('group_id')){
                $group = $request->get('group_id');
                $s->where('group_id',$group);
            }

            $students = $s->get();
        }else{
            $students = [];
        }
        $payments = [];
        /*if($students)
        {
            foreach ($students as $student){

                $payments = StudentPayment::query()->where('student_id',$student->id)->where('class_id',$student->class_id)->get();

                //dd($payments);
            }


        }*/
        $repository = $this->repository;

        return view('admin.account.report.student-fee-report',compact('repository','students'));
    }

    public function student_monthly_fee_report(Request $request, Student $student)
    {
        $monthId = $request->month;
        if($request->all()){
            $s = $student->newQuery();
            if($request->get('class_id')){
                $class = $request->get('class_id');
                $s->where('class_id',$class);
            }
            if($request->get('section_id')){
                $section = $request->get('section_id');
                $s->where('section_id',$section);
            }
            if($request->get('group_id')){
                $group = $request->get('group_id');
                $s->where('group_id',$group);
            }
            $students = $s->get();
        }else{
            $students = [];
        }

        $monthSetup=0;
        if($monthId){

            $monthSetupId = FeeSetup::query()->where('session_id',activeYear())->where('month',$monthId)->first()->id ?? '';
            $monthSetup = FeePivot::query()->where('fee_setup_id',$monthSetupId)->sum('amount');
        }

        $repository = $this->repository;

        return view('admin.account.report.student-monthly-fee-report',compact('repository','students','monthId','monthSetup'));
    }

}
