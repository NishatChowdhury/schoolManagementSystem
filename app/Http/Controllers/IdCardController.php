<?php

namespace App\Http\Controllers;

use App\Repository\StudentRepository;
use App\Staff;
use App\Student;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class IdCardController extends Controller
{
    /**
     * @var StudentRepository
     */
    private $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        $repository = $this->repository;
        return view('admin.student.designStudentCard',compact('repository'));
    }

    public function staff()
    {
        $repository = $this->repository;
        return view('admin.staff.designCard',compact('repository'));
    }

    public function pdf(Request $request, Student $student)
    {
        //dd($request->all());
        $std = $student->newquery();

        $std->whereIn('session_id',activeYear());

        if($request->class){
            $std->where('class_id',$request->class);
        }
        if($request->section){
            $std->where('section_id',$request->section);
        }
        if($request->group){
            $std->where('group_id',$request->group);
        }
        if($request->ranks){
            $ranks = explode(',',$request->ranks);
            $std->whereIn('rank',$ranks);
        }

        $students = $std->where('status','<>',2)->orderBy('rank')->get();

        $card = $request->except('_token');

        return view('admin.student.card-new',compact('students','card'));

//        $total = DB::table('partial_shipments')
//            ->where('lc_id', $request->lc)
//            ->selectRaw('count(*), sum(cont) as conts, sum(qty) as qtys, sum(qty * rate) as lc_values')
//            ->get();

        view()->share('card', (object)$card);
        view()->share('data', $data);
        //view()->share('total', $total);

        $pdf = PDF::loadView('admin.student.card');

        $pdf->setPaper('a4', 'portrait');

        //return $pdf->download('students.pdf'); // to download use download() function
        return $pdf->stream(); // to display use stream() function
    }


    public function staffPdf(Request $request)
    {

        //dd($request->all());
        if($request->user == 1){
            $staffs = Staff::query()->where('staff_type_id',1)->get();
        }elseif($request->user == 2){
            $staffs = Staff::query()->where('staff_type_id',2)->get();
        }else{
            $staffs = Staff::query()->get();
        }

        $card = $request->except('_token');

        return view('admin.staff.card-new',compact('staffs','card'));


//        $total = DB::table('partial_shipments')
//            ->where('lc_id', $request->lc)
//            ->selectRaw('count(*), sum(cont) as conts, sum(qty) as qtys, sum(qty * rate) as lc_values')
//            ->get();

        /*view()->share('card', (object)$card);
        view()->share('staffs', $staffs);*/
        //view()->share('total', $total);

        $pdf = PDF::loadView('admin.staff.card');

        $pdf->setPaper('a4', 'portrait');

        //return $pdf->download('staffs.pdf');
        //return $pdf->stream();

    }
}
