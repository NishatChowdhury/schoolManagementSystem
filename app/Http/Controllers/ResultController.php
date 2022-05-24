<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\AssignSubject;
use App\Exam;
use App\ExamResult;
use App\ExamSchedule;
use App\FinalMark;
use App\FinalResult;
use App\FM;
use App\Grade;
use App\Mark;
use App\Repository\ResultRepository;
use App\Student;
use App\Subject;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * @var ResultRepository
     */
    private $repository;

    public function __construct(ResultRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index(Request $request,ExamResult $examResult)
    {
        if($request->all()){
            $r = $examResult->newQuery();

            if($request->get('studentId')){
                $r->whereHas('studentId',function($query)use($request){
                    $query->where('studentId',$request->get('studentId'));
                });
            }

            if($request->get('exam_id')){
                $r->where('exam_id',$request->get('exam_id'));
            }

            if($request->get('class_id')){
                $r->where('academic_class_id',$request->get('class_id'));
            }

            $results = $r->get();
        }else{
            $results = [];
        }

        $repository = $this->repository;
        return view ('admin.exam.examresult',compact('repository','results'));
    }

    public function generateResult($examId)
    {
        $method = 1;

        $sessionId = 1;
        //$examId = 1;
        //$classId = 2;
        //$sectionId = 2;
        //$groupId = null;

        if($method == 1){
            $this->normalResult($sessionId,$examId);
        }elseif($method == 2){
            $classes = AcademicClass::all();

            foreach($classes as $class){

                $subjectCount = ExamSchedule::query()
                    ->where('academic_class_id',$class->id)
                    ->where('exam_id',$examId)
                    ->count();

                $marks = Mark::query()
                    ->where('academic_class_id',$class->id)
                    ->where('exam_id',$examId)
                    ->get()
                    ->groupBy('student_id');

                foreach($marks as $student => $mark){

                    $isFail = Mark::query()
                        ->where('academic_class_id',$class->id)
                        ->where('exam_id',$examId)
                        ->where('student_id',$student)
                        ->where('grade','F')
                        ->exists();

                    $data['academic_class_id'] = $class->id;
                    $data['session_id'] = $sessionId;
                    $data['exam_id'] = $examId;
                    $data['class_id'] = $class->id;
                    $data['student_id'] = $student;
                    $data['total_mark'] = $mark->sum('total_mark');

                    $optional = Student::query()->findOrFail($student)->subject_id;
                    $optionalMark = $mark->where('subject_id',$optional)->first()->gpa ?? 0;
                    //$subjectCount = $subjectCount - ($optional > 0 ? 1 : 0);

                    $data['gpa'] = $isFail ? 0 : ($mark->sum('gpa') / $subjectCount);

                    $grade = Grade::query()
                        ->where('system',1)
                        ->where('point_from','<=',$mark->sum('gpa') / $subjectCount)
                        ->where('point_to','>=',$mark->sum('gpa') / $subjectCount)
                        ->first();

                    if($optionalMark >= 2){
                        $data['gpa'] = $isFail ? 0 : ($mark->sum('gpa') - 2) / $subjectCount;

                        $data['total_mark'] = $mark->sum('total_mark') - 40;

                        $grade = Grade::query()
                            ->where('system',1)
                            ->where('point_from','<=',$data['gpa'])
                            ->where('point_to','>=',$data['gpa'])
                            ->first();
                    }

                    if($grade){
                        $data['grade'] = $isFail ? 'F' : $grade->grade;
                    }else{
                        $data['grade'] = null;
                    }

                    $data['rank'] = null;

                    $result = ExamResult::query()
                        ->where('academic_class_id',$class->id)
                        ->where('exam_id',$examId)
                        ->where('student_id',$data['student_id'])
                        ->first();

                    if($result != null){
                        $result->update($data);
                    }else{
                        ExamResult::query()->create($data);
                    }
                }
                /* update exam rank start */
                $results = ExamResult::query()
                    ->where('academic_class_id',$class->id)
                    ->where('exam_id',$examId)
                    ->where('group_id',null)
                    ->orderByDesc('gpa')
                    ->orderByDesc('total_mark')
                    ->get();

                //dd($results);

                foreach($results as $key => $result){
                    $rank = $key + 1;
                    $result->update(['rank'=>$rank]);
                }
                /* update exam rank end */
            }
        }

        //dd('slipped');

        return redirect('exam/examresult');
    }

    public function resultDetails($id)
    {
        $result = ExamResult::query()->findOrFail($id);

        $marks = Mark::query()
            ->where('student_id',$result->student_id)
            ->where('exam_id',$result->exam_id)
            //->where('class_id',$result->class_id)
            //->where('session_id',$result->session_id)
            ->where('academic_class_id',$result->academic_class_id)
            ->join('subjects','subjects.id','=','marks.subject_id')
            ->select('marks.*','subjects.level')
            ->orderBy('level')
            ->get();

        return view('admin.exam.result-details',compact('result','marks'));
    }

    public function finalResultDetails($id)
    {
        $result = FinalResult::query()->findOrFail($id);

        $marks = FinalMark::query()
            ->where('student_id',$result->student_id)
            //->where('exam_id',$result->exam_id)
            ->where('class_id',$result->class_id)
            ->where('session_id',$result->session_id)
            ->join('subjects','subjects.id','=','final_marks.subject_id')
            ->select('final_marks.*','subjects.level')
            ->orderBy('level')
            ->get();

        return view('admin.exam.final-result-details',compact('result','marks'));
    }

    public function setfinalresultrule()
    {
        $exams = Exam::query()->where('session_id',2)->get();
        return view ('admin.exam.setfinalresultrule',compact('exams'));
    }

    public function finalResultNew(Request $request)
    {
        $students = Student::query()
            ->where('session_id',2)
            ->where('class_id',11)
            //->where('section_id',4)
            ->get();
        //$subjects = Subject::all();
        $rules = $request->except('_token');
        //dd($students);

        foreach($students as $student){
            $subjects = $student->academicClass->subjects;
            foreach($subjects as $subject){
                //dd($subjects);
                $objective = 0;
                $written = 0;
                $practical = 0;
                $viva = 0;
                foreach($rules as $exam => $rule){
                    $mark = Mark::query()
                        ->where('student_id',$student->id)
                        ->where('subject_id',$subject->subject_id)
                        ->where('exam_id',$exam)
                        ->first();
                    if($mark){
                        $objective += ($mark->objective * $rule)/100;
                        $written += ($mark->written * $rule)/100;
                        $practical += ($mark->practical * $rule)/100;
                        $viva += ($mark->viva * $rule)/100;
                    }
                }

                if($mark){
                    $data['session_id'] = $mark->session_id;
                    $data['exam_id'] = null;
                    $data['class_id'] = $mark->class_id;
                    $data['section_id'] = $mark->section_id;
                    $data['group_id'] = $mark->group_id;
                    $data['subject_id'] = $mark->subject_id;
                    $data['student_id'] = $mark->student_id;
                    $data['full_mark'] = $mark->full_mark;
                    $data['objective'] = $objective;
                    $data['written'] = $written;
                    $data['practical'] = $practical;
                    $data['viva'] = $viva;
                    $data['total_mark'] = $data['objective'] + $data['written'] + $data['practical'] + $data['viva'];
                    //dd($data['total_mark']);
                    $data['gpa'] = $this->gpa($data['full_mark'],$data['total_mark'],$mark->grade_id);
                    $data['grade'] = $this->grade($data['full_mark'],$data['total_mark'],$mark->grade_id);

                    $finalMark = FinalMark::query()
                        ->where('session_id',$mark->session_id)
                        ->where('subject_id',$mark->subject_id)
                        ->where('student_id',$mark->student_id)
                        ->first();


                    if($finalMark == null){
                        FinalMark::query()->create($data);
                    }else{
                        $finalMark->update($data);
                    }

                }
            }
        }

        return redirect()->back();
    }

    public function finalResult(Request $request)
    {
        $rules = $request->all();
        $t = [];
        foreach($rules as $key => $rule){
            if($key != '_token'){
                $marks = Mark::query()
                    ->where('class_id',11)
                    ->where('exam_id',$key)
                    ->get();
                foreach($marks as $mark){
                    $data['session_id'] = $mark->session_id;
                    $data['exam_id'] = $mark->exam_id;
                    $data['class_id'] = $mark->class_id;
                    $data['subject_id'] = $mark->subject_id;
                    $data['student_id'] = $mark->student_id;
                    $data['full_mark'] = $mark->full_mark;
                    $data['objective'] = ($mark->objective * $rule)/$mark->full_mark;
                    $data['written'] = ($mark->written * $rule)/$mark->full_mark;
                    $data['practical'] = ($mark->practical * $rule)/$mark->full_mark;
                    $data['viva'] = ($mark->viva * $rule)/$mark->full_mark;
                    $data['total_mark'] = ($mark->objective * $rule)/$mark->full_mark + ($mark->written * $rule)/$mark->full_mark + ($mark->practical * $rule)/$mark->full_mark + ($mark->viva * $rule)/$mark->full_mark;
                    $data['gpa'] = null;
                    $data['grade'] = null;
                    FinalMark::query()->create($data);
                }
            }
        }


        return redirect()->back();
    }

    public function f(Request $request, FinalResult $examResult)
    {
        dd($request->all());
        if($request->all()){
            $r = $examResult->newQuery();

            if($request->get('studentId')){
                $r->whereHas('studentId',function($query)use($request){
                    $query->where('studentId',$request->get('studentId'));
                });
            }
            if($request->get('session_id')){
                $r->where('session_id',$request->get('session_id'));
            }

            if($request->get('exam_id')){
                $r->where('exam_id',$request->get('exam_id'));
            }

            if($request->get('class_id')){
                $r->where('class_id',$request->get('class_id'));
            }

            if($request->get('section_id')){
                $r->whereHas('student',function($query)use($request){
                    $query->where('section_id',$request->get('section_id'));
                });
            }

            if($request->get('group_id')){
                $r->whereHas('student',function($query)use($request){
                    $query->where('group_id',$request->get('group_id'));
                });
            }

            $results = $r->get();
        }else{
            $results = [];
        }

        $repository = $this->repository;
        return view ('admin.exam.finalresult',compact('repository','results'));
    }

    public function gpa($full,$totalMark,$id)
    {
        $total = ($totalMark * 100)/$full;
        $grade = Grade::query()
            ->where('system',$id)
            ->where('mark_from','<=',(int)$total)
            ->where('mark_to','>=',(int)$total)
            ->first();

        return $grade ? $grade->point_from : null;
    }

    public function grade($full,$totalMark,$id)
    {
        $total = ($totalMark * 100)/$full;
        $grade = Grade::query()
            ->where('system',$id)
            ->where('mark_from','<=',(int)$total)
            ->where('mark_to','>=',(int)$total)
            ->first();

        return $grade ? $grade->grade : null;
    }

    public function getfinalresultrule(Request $request, FinalResult $examResult)
    {
        if($request->all()){
            $r = $examResult->newQuery();

            if($request->get('studentId')){
                $r->whereHas('studentId',function($query)use($request){
                    $query->where('studentId',$request->get('studentId'));
                });
            }
//            if($request->get('session_id')){
//                $r->where('session_id',$request->get('session_id'));
//            }

//            if($request->get('exam_id')){
//                $r->where('exam_id',$request->get('exam_id'));
//            }

            if($request->get('class_id')){
                $r->where('class_id',$request->get('class_id'));
            }

            if($request->get('section_id')){
                $r->whereHas('student',function($query)use($request){
                    $query->where('section_id',$request->get('section_id'));
                });
            }

            if($request->get('group_id')){
                $r->whereHas('student',function($query)use($request){
                    $query->where('group_id',$request->get('group_id'));
                });
            }

            $results = $r->get();
        }else{
            $results = [];
        }

        $repository = $this->repository;
        return view ('admin.exam.finalresult',compact('repository','results'));
    }

    public function calcFinalResult(){
        $sessionId = 2;
        //$examId = 4;
        $classId = 11;
        $sectionId = null;
        $groupId = 1;

//    $subjectCount = Mark::query()
//        ->where('session_id',$sessionId)
//        ->where('exam_id',$examId)
//        ->where('class_id',$classId)
//        ->get()
//        ->groupBy('subject_id')
//        ->count();

        if($classId == 1){
            $subjectCount = 5;
        }elseif($classId == 2){
            $subjectCount = 6;
        }elseif($classId == 3){
            $subjectCount = 7;
        }elseif($classId == 4){
            $subjectCount = 7;
        }elseif($classId == 5){
            $subjectCount = 9;
        }elseif($classId == 6){
            $subjectCount = 8;
        }elseif($classId == 7){
            $subjectCount = 6;
        }elseif($classId == 8){
            $subjectCount = 9;
        }elseif($classId == 9){
            $subjectCount = 9;
        }elseif($classId == 10){
            $subjectCount = 7;
        }elseif($classId == 11){
            $subjectCount = 11;
        }else{
            $subjectCount = 11;
        }

        $marks = FinalMark::query()
            ->where('session_id',$sessionId)
            //->where('exam_id',$examId)
            ->where('class_id',$classId)
            //->where('section_id',$sectionId)
            //->where('group_id',$groupId)
            ->get()
            ->groupBy('student_id');

        foreach($marks as $student => $mark){
            $isFail = FinalMark::query()
                ->where('session_id',$sessionId)
                //->where('exam_id',$examId)
                ->where('class_id',$classId)
                ->where('student_id',$student)
                ->where('grade','F')
                ->exists();


            $data['session_id'] = $sessionId;
            //$data['exam_id'] = $examId;
            $data['class_id'] = $classId;
            $data['section_id'] = $sectionId;
            $data['group_id'] = $groupId;
            $data['student_id'] = $mark->first()->student_id;
            $data['total_mark'] = $mark->sum('total_mark');

            $optional = Student::query()->findOrFail($student)->subject_id;
            $optionalMark = $mark->where('subject_id',$optional)->first()->gpa ?? 0;

            $data['gpa'] = $isFail ? 0 : $mark->sum('gpa') / $subjectCount;

            $grade = Grade::query()
                ->where('system',1)
                ->where('point_from','<=',$mark->sum('gpa') / $subjectCount)
                ->where('point_to','>=',$mark->sum('gpa') / $subjectCount)
                ->first();

            if($optionalMark >= 2){
                $data['gpa'] = $isFail ? 0 : ($mark->sum('gpa') - 2) / $subjectCount;

                $data['total_mark'] = $mark->sum('total_mark') - 40;

                $grade = Grade::query()
                    ->where('system',1)
                    ->where('point_from','<=',$data['gpa'])
                    ->where('point_to','>=',$data['gpa'])
                    ->first();
            }

            if($grade){
                $data['grade'] = $isFail ? 'F' : $grade->grade;
            }else{
                $data['grade'] = null;
            }
            $data['rank'] = null;

            $result = FinalResult::query()
                ->where('session_id',$sessionId)
                //->where('exam_id',$examId)
                ->where('class_id',$classId)
                ->where('student_id',$data['student_id'])
                ->first();

            if($result != null){
                $result->update($data);
            }else{
                FinalResult::query()->create($data);
            }
        }

        /* update exam rank start */
        $results = FinalResult::query()
            ->where('session_id',$sessionId)
            //->where('exam_id',$examId)
            ->where('class_id',$classId)
            ->where('section_id',$sectionId)
            ->where('group_id',$groupId)
            //->where('grade','<>','F')
            ->orderByDesc('gpa')
            ->orderByDesc('total_mark')
            ->get();

        //dd($results);

        foreach($results as $key => $result){
            $rank = $key + 1;
            $result->update(['rank'=>$rank]);
        }
        /* update exam rank end */

    }

    public function normalResult($sessionId,$examId)
    {
        $classes = AcademicClass::all();

        foreach($classes as $class){
            $subjectCount = ExamSchedule::query()
                ->where('academic_class_id',$class->id)
                ->where('exam_id',$examId)
                ->count();

            $marks = Mark::query()
                ->where('academic_class_id',$class->id)
                ->where('exam_id',$examId)
                ->get()
                ->groupBy('student_id');

            foreach($marks as $student => $mark){
                $data['session_id'] = $sessionId;
                $data['exam_id'] = $examId;
                $data['class_id'] = $class->id;
                $data['section_id'] = $mark->first()->section_id;
                $data['group_id'] = $mark->first()->group_id;
                $data['student_id'] = $mark->first()->student_id;
                $data['total_mark'] = $mark->sum('total_mark');

                $optional = Student::query()->findOrFail($student);

                $isFail = Mark::query()
                    //->where('session_id',$sessionId)
                    ->where('exam_id',$examId)
                    //->where('class_id',$class->id)
                    ->where('student_id',$student)
                    ->where('subject_id','<>',$optional->subject_id)
                    ->where('grade','F')
                    ->exists();

                if($optional){
                    $optionalMark = $mark->where('subject_id',$optional->subject_id)->first()->gpa ?? 0;
                    if($optionalMark >= 2){
                        $data['gpa'] = $isFail ? 0 : ($mark->sum('gpa') - 2) / ($subjectCount - 1);

                        $data['total_mark'] = $mark->sum('total_mark') - 40;

                        $grade = Grade::query()
                            ->where('point_from','<=',$data['gpa'])
                            ->where('point_to','>=',$data['gpa'])
                            ->first();
                    }else{
                        $data['gpa'] = $isFail ? 0 : $mark
                                ->where('subject_id','<>',$optional->subject_id)
                                ->sum('gpa') / ($subjectCount - 1);

                        $grade = Grade::query()
                            ->where('system',1)
                            ->where('point_from','<=',$mark->where('subject_id','<>',$optional->subject_id)->sum('gpa') / ($subjectCount - 1))
                            ->where('point_to','>=',$mark->where('subject_id','<>',$optional->subject_id)->sum('gpa') / ($subjectCount - 1))
                            ->first();
                    }
                }else{
                    $data['gpa'] = $isFail ? 0 : $mark->sum('gpa') / $subjectCount;

                    $grade = Grade::query()
                        ->where('system',1)
                        ->where('point_from','<=',$mark->sum('gpa') / $subjectCount)
                        ->where('point_to','>=',$mark->sum('gpa') / $subjectCount)
                        ->first();
                }

                if($grade){
                    $data['grade'] = $isFail ? 'F' : $grade->grade;
                }else{
                    $data['grade'] = null;
                }
                $data['rank'] = null;

                $result = ExamResult::query()
                    ->where('academic_class_id',$class->id)
                    //->where('session_id',$sessionId)
                    ->where('exam_id',$examId)
                    //->where('class_id',$class->id)
                    ->where('student_id',$data['student_id'])
                    ->first();

                if($result != null){
                    $result->update($data);
                }else{
                    ExamResult::query()->create($data);
                }
            }

            /* update exam rank start */
            $results = ExamResult::query()
                ->where('academic_class_id',$class->id)
                //->where('session_id',$sessionId)
                ->where('exam_id',$examId)
                //->where('class_id',$class->id)
                //->where('section_id',$sectionId)
                //->where('group_id',null)
                //->where('grade','<>','F')
                ->orderByDesc('gpa')
                ->orderByDesc('total_mark')
                ->get();

            foreach($results as $key => $result){
                $rank = $key + 1;
                $result->update(['rank'=>$rank]);
            }
            /* update exam rank end */

        }

        return redirect('exam/examresult');
    }

    public function allDetails(Request $request,ExamResult $examResult)
    {
        if($request->all()){
            $r = $examResult->newQuery();

            if($request->get('studentId')){
                $r->whereHas('studentId',function($query)use($request){
                    $query->where('studentId',$request->get('studentId'));
                });
            }

            if($request->get('session_id')){
                $r->where('session_id',$request->get('session_id'));
            }

            if($request->get('exam_id')){
                $r->where('exam_id',$request->get('exam_id'));
            }

            if($request->get('class_id')){
                $r->where('academic_class_id',$request->get('class_id'));
            }

            $results = $r->get();
        }else{
            $results = [];
        }

        $repository = $this->repository;
        return view('admin.exam.all-details',compact('results','repository'));
    }

    public function tabulation($examID,Request $request)
    {
        if($request->has('class_id')){
            //$exam = Exam::query()->findOrFail($examID);
            $results = ExamResult::query()->where('exam_id',$examID)->where('academic_class_id',$request->get('class_id'))->orderBy('rank')->get();

            //$subjects = $this->tabulationSubjects($request->get('class_id'),$request->get('group_id'));
            $subjects = ExamSchedule::query()
                ->where('academic_class_id',$request->get('class_id'))
                ->where('exam_id',$examID)
                ->get();
        }else{
            $results = collect();
            $subjects = null;
        }
        //dd($request->get('group_id').' '.$request->get('class_id'));
        $results = $results->count() == 0 ? null : $results;
        $repository = $this->repository;
        return view('admin.exam.tabulation',compact('repository','results','subjects','examID'));
    }
}
