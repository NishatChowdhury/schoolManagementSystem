<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\Attendance;
use App\Classes;
use App\HolidayDuration;
use App\RawAttendance;
use App\Repository\AttendanceRepository;
use App\Shift;
use App\Staff;
use App\Student;
use App\StudentLeave;
use App\weeklyOff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * @var AttendanceRepository
     */
    private $repository;

    public function __construct(AttendanceRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        return view('admin.attendance.attendance');
    }

    public function dashboard()
    {
        //month Calculation start
        $month_name = date('F');
        //month Calculation end

//      total Students present attendance count start
        $today_date = date('Y-m-d');
        $students = Student::query()->get('studentId');
        $total_attendance = $i = 0;
        foreach ($students as $student){
            $total_attendances[$i] = RawAttendance::query()->where('access_date', 'like','%'.$today_date.'%')->where('registration_id', $student->studentId)->first();
            if($total_attendances[$i] != null){
                $total_attendance++;
            }
            $i++;
        }
//      total  Students present attendance count end

//      total Students absent count start
        $total_student = count($students);
        $total_absents = $total_student - $total_attendance;
//      total Students absent count end

//      Total Teacher Present Attendance Count Start
        $teachers = Staff::query()->whereNotNull('role_id')->get('role_id');
        $total_attendance_teacher = $n =0;
        foreach ($teachers as $teacher){
            $total_attendance_teachers[$n] = RawAttendance::query()->where('access_date','like','%'.$today_date.'%')->where('registration_id', $teacher->card_id)->first();
            if($total_attendance_teachers[$n] != null){
                $total_attendance_teacher++;
            }
            $i++;
        }
        $total_teacher = count($teachers);
        $total_absents_teacher = $total_teacher - $total_attendance_teacher;
//      Total Teacher Present Attendance Count End

//        Class wish attendance list start
        $academicClasses = AcademicClass::query()->get();
//        $class_attendances = DB::select("SELECT COUNT(*) AS totalScan, class_id , c.name FROM students, academic_classes as c WHERE students.class_id=c.id AND studentId in (SELECT DISTINCT registration_id FROM attendances WHERE access_date LIKE '".$today_date."%') GROUP BY students.class_id");
        $class_attendances = [];

//        Class wish attendance list end

        return view('admin.attendance.dashboard',compact('month_name','today_date','total_attendance','total_absents','total_student','total_attendance_teacher','total_absents_teacher','total_teacher','academicClasses','class_attendances'));
    }

    public function getAttendanceMonthly(Request $request){
        //dd($request->all());
        $students = Student::query()->where('class_id', $request->academicClass)->orderBy('rank')->get();
        $date = $request->year.'-'.$request->month;
        $month = $request->month;
        $year = $request->year;
        $attn = [];
        //dd($date);
        //dd($students);
        foreach($students as $student){
            $attn[] = Attendance::query()->where('registration_id',$student->studentId)->where('access_date','like',$date.'%')->get();
        }
        //dd($attn);

        $teachers = Staff::query()->where('staff_type_id','teacher')->get();

        $attn_teacher =[];
        foreach ($teachers as $teacher){
            $attn_teacher[] = Attendance::query()->where('registration_id', $teacher->role_id)->where('access_date','like',$date.'%')->get();
        }
        if ($request->user == 2){
            return view('admin.attendance.month_row_teacher',compact('teachers','month','year'));
        }else{
            return view('admin.attendance.month_row',compact('students','month','year'));
        }

    }

    public function teacher(Request $request)
    {

        if($request->has('staff_type_id') && $request->has('date')){
            $staffs = Staff::query()
                ->where('staff_type_id',$request->get('staff_type_id'))
                ->orderBy('code')
                ->get();

            $date = $request->get('date');

            $attend = [];
            foreach($staffs as $staff){
                $attn = RawAttendance::query()
                    ->where('registration_id',$staff->card_id)
                    ->where('access_date','like','%'.$date.'%')
                    ->get();

                if($attn->count() > 0){
                    $attend[] = (object)[
                        'name'=>$staff->name,
                        'card'=>$staff->card_id,
                        'designation' => $staff->title,
                        //'date'=>$request->date,
                        'enter'=>Carbon::parse($attn->first()->access_date)->format('H:i:s'),
                        'exit'=>Carbon::parse($attn->last()->access_date)->format('H:i:s'),
                        'status'=>'P',
                        'is_notified'=>''
                    ];
                }else{
                    $attend[] = (object)[
                        'name'=>$staff->name,
                        'card'=>$staff->card_id,
                        'designation' => $staff->title,
                        //'date'=>$request->date,
                        'enter'=>'-',
                        'exit'=>'-',
                        'status'=>'A',
                        'is_notified'=>''
                    ];
                    //dd($attendances);
                }
            }
        }else{
            $attend = [];
            $staffs = [];
            $date = '';
        }

//        $today_date = date('Y-m-d');
//        $teachers = Staff::query()->get();
//        //dd($teachers);
//        $total_attendance_teacher = $n =0;
//        foreach ($teachers as $teacher){
//            $total_attendance_teachers[$n] = Attendance::query()->where('access_date','like','%'.$today_date.'%')->where('registration_id', $teacher->card_id)->first();
//            if($total_attendance_teachers[$n] != null){
//                $total_attendance_teacher++;
//            }
//            $n++;
//        }
//        $total_teacher = count($teachers);
//        $total_absents_teacher = $total_teacher - $total_attendance_teacher;
//
//        $teachers_data =DB::select(DB::raw("SELECT attendances.registration_id, staffs.role_id, attendances.access_date, staffs.name FROM attendances INNER JOIN staffs ON attendances.registration_id=staffs.card_id WHERE attendances.access_date like'".$today_date."%'"));
//
//        $teacher_late_data = Attendance::query()->where('access_date','like','%'.$today_date.'%')->where('access_date', '<' ,$today_date.' 09:00:00')->get();

        return view('admin.attendance.teacher', compact('attend','staffs','date'));
    }

//    public function setting()
//    {
//        return view('admin.attendance.setting');
//    }

    public function student(Student $student, Request $request)
    {
        if($request->all() == []){
            $attendances = [];
            $repository = $this->repository;
            return view('admin.attendance.student',compact('attendances','repository'));
        }

        $today = $request->get('date');
        //$today = '2019-11-06';

        $s = $student->newQuery();

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
            $s->where('academic_class_id',$class);

            $academicClass = AcademicClass::query()->findOrFail($request->get('class_id'));
        }else{
            $academicClass = '';
        }
//        if($request->get('section_id')){
//            $section = $request->get('section_id');
//            $s->where('section_id',$section);
//        }
//        if($request->get('group_id')){
//            $group = $request->get('group_id');
//            $s->where('group_id',$group);
//        }

        $students = $s
            //->whereIn('studentId',['S194300','S194278'])
            ->orderBy('rank')
            ->get();
        //dd($students);

//        $attendances = Attendance::query()
//            ->whereIn('registration_id',$students)
//            ->whereDate('access_date',$today)
//            ->paginate(20);

        $attend = [];
        foreach($students as $student){
            $attn = RawAttendance::query()
                ->where('access_date','like','%'.$today.'%')
                ->where('registration_id',$student->studentId)
                ->get();

            if($attn->count() > 0){
                $attend[] = (object)[
                    'student' => $student->name,
                    'card' => $student->studentId,
                    'rank' => $student->rank,
                    'date' => $today,
                    'class' => $student->academicClass->name,
                    'subject' => 'Subject',
                    'teacher' => 'Teacher',
                    'enter' => $attn->first()->access_time,
                    'exit' => $attn->last()->access_time,
                    'status' => $this->status($student->id,$today,$attn->first()->access_date,$attn->last()->access_date),
                    'is_notified' => 'Is Notified'
                ];
            }else{
                $attend[] = (object)[
                    'student' => $student->name,
                    'card' => $student->studentId,
                    'rank' => $student->rank,
                    'date' => $today,
                    'class' => $student->academicClass->name,
                    'subject' => 'Subject',
                    'teacher' => 'Teacher',
                    'enter' => '-',
                    'exit' => '-',
                    'status' => $this->status($student->id,$today),
                    'is_notified' => 'Is Notified'
                ];
                //dd($attendances);
            }
        }
        $repository = $this->repository;
        $attendances = collect($attend);
        //$attendances = [];

        return view('admin.attendance.student',compact('attendances','repository','academicClass','today'));
    }

    public function report(Request $request){

        $allClasses = Classes::query()->get(['id','name']);

        if($request->get('user') == 2){
            $students = Staff::query()->get();

            $month = $request->month;
            $year = $request->year;
            $date = Carbon::createFromDate($year,$month)->format('Y-m');
            $attn = [];

            foreach($students as $student){
                $attn[] = RawAttendance::query()
                    ->where('registration_id',$student->card_id)
                    ->where('access_date','like',$date.'%')
                    ->get();
            }
        }elseif($request->get('user') == 1){
            if($request->has('class_id') && $request->has('year') && $request->has('month')){
                $students = Student::query()
                    ->where('academic_class_id', $request->class_id)
                    ->orderBy('rank')
                    ->get();
                $month = $request->month;
                $year = $request->year;
                $date = Carbon::createFromDate($year,$month)->format('Y-m');
                $attn = [];

                foreach($students as $student){
                    $attn[] = RawAttendance::query()
                        ->where('registration_id',$student->studentId)
                        ->where('access_date','like',$date.'%')
                        ->get();
                }
            }else{
                $students = [];
                $month = 0;
                $year = 0;
            }
        }else{
            $students = [];
            $month = 0;
            $year = 0;
        }

        $repository = $this->repository;

        return view('admin.attendance.report',compact('allClasses','repository','year','month','students'));
    }

    public function individualAttendance(Request $request){
        $explode = explode(' - ',$request->dateRangeStudent);
        $start = $explode[0];
        $end = $explode[1];
        $student_id =$request->studentCardId;

        $std = Student::query()->where('studentId',$student_id)->first();
        if ($std){
            $attendances = Attendance::query()->where('registration_id',$student_id)->whereBetween('access_date',[$start,$end])->get()->groupBy(function($date) {
                return Carbon::parse($date->access_date)->format('Y-m-d');
            });
        }
        return view('admin.attendance.individualStudentAttendance',compact('std','attendances'));
    }

    public function individualTeacherAttendance(Request $request)
    {
        //dd($request->teacherCardId);
        $explode = explode(' - ',$request->dateRangeTeacher);
        $start = Carbon::parse($explode[0])->format('Y-m-d H:i:s');
        $end = Carbon::parse($explode[1])->format('Y-m-d H:i:s');
        $teacherCardId = $request->teacherCardId;
        $teachers = Staff::query()->where('card_id', $teacherCardId)->first();
        if ($teachers){
            $attendances = Attendance::query()->where('registration_id',$teacherCardId)->whereBetween('access_date',[$start,$end])->get()->groupBy(function($date) {
                return Carbon::parse($date->access_date)->format('Y-m-d H:i:s');
            });

        }

        return view('admin.attendance.individualTeacherAttendance',compact('teachers','attendances'));
    }

    public function classAttendance(Request $request){
        $explode = explode(' - ',$request->dateRangeClass);
        $start = $explode[0];
        $end = $explode[1];
        $class_id = $request->academicClass;
        $students = Student::query()->where('class_id', $class_id)->get();

        return view('admin.attendance.classAttendance',compact('students','start', 'end'));
    }

    public function status($studentId, $date, $enter = null, $exit = null)
    {
        if(!$enter && !$exit){
            $isHoliday = HolidayDuration::query()->whereDate('date',$date)->exists();

            $dayOfWeekIso = Carbon::parse($date)->dayOfWeekIso;
            $isWeeklyOff = weeklyOff::query()->where('show_option','like','%'.$dayOfWeekIso.'%')->exists();

            $inLeave = StudentLeave::query()
                ->where('student_id',$studentId)
                ->where('date',$date)
                ->exists();

            if($isWeeklyOff){
                $status = 'W';
            }elseif($isHoliday){
                $status = 'H';
            }elseif($inLeave){
                $status = 'L';
            }else{
                $status = 'A';
            }

        }else{
            $shiftInTime = Shift::query()->first()->start;
            $shiftOutTime = Shift::query()->first()->end;
            $grace = Shift::query()->first()->grace;

            $shiftInTime = Carbon::make($date.' '.$shiftInTime)->addMinutes($grace);
            $shiftOutTime = Carbon::make($date.' '.$shiftOutTime);

            $isLate = $enter > $shiftInTime;
            $isEarly = $exit < $shiftOutTime;

            if($isLate){
                $status = 'D';
            }elseif($isEarly){
                $status = 'E';
            }else{
                $status = 'P';
            }
        }

        return $status;
    }


}
