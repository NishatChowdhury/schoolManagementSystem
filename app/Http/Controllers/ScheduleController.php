<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\AssignSubject;
use App\ClassSchedule;
use App\Repository\ScheduleRepository;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ScheduleController extends Controller
{
    /**
     * @var ScheduleRepository
     */
    private $repository;

    public function __construct(ScheduleRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index($classId)
    {
        $schedules = ClassSchedule::query()
            ->where('academic_class_id',$classId)
            ->get()
            ->sortBy('start')
            ->groupBy('day_id')
            ->sortBy('day_id');

        $class = AcademicClass::query()->findOrFail($classId);
        $subjects = $class->subjects;
        $teachers = Staff::query()->where('staff_type_id',2)->pluck('name','id');

        $repository = $this->repository;
        return view('admin.institution.schedule',compact('class','subjects','teachers','schedules','repository'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        ClassSchedule::query()->create($request->all());
        Session::flash('success','Routine has been added');
        return redirect()->back();
    }
}
