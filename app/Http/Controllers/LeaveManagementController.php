<?php

namespace App\Http\Controllers;

use App\LeavePurpose;
use App\Student;
use App\StudentLeave;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Repository\StudentRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LeaveManagementController extends Controller
{
    private $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        $allData = StudentLeave::all()->groupBy('leaveId');
        return view('admin.leaveManagement.view-leave',compact('allData'));
    }


    public function add()
    {
        $leave_purpose = LeavePurpose::all()->pluck('leave_purpose','id');
        return view('admin.leaveManagement.add-leave',compact('leave_purpose'));
    }


    public function store(Request $request)
    {
        $student = Student::query()->where('studentId',$request->student_id)->latest()->first();

        if(!$student){
            return redirect()->back();
        }

        $start = $request->get('start_date');
        $end = $request->get('end_date');

        if(!$end){
            $end = $start;
        }

        $period = CarbonPeriod::create($start,$end);

        foreach ($period as $date) {
            $d = $date->format('Y-m-d');
            $data = [
                'leaveId' => date('ymdHi'),
                'student_id' => $student->id,
                'date' => $d,
                'leave_purpose_id' => $request->get('leave_purpose_id'),
            ];
            StudentLeave::query()->create($data);
        }

        Session::flash('success','Leave has been entered!');
        return redirect('admin/attendance/leaveManagement');

    }


    public function destroy($id)
    {
        //
    }
}
