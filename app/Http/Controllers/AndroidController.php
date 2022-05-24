<?php

namespace App\Http\Controllers;

use App\Models\Backend\ExamResult;
use App\Http\Resources\EventsCollection;
use App\Http\Resources\EventsResource;
use App\Http\Resources\RoutineResource;
use App\Http\Resources\TeacherCollection;
use App\Http\Resources\TeacherResource;
use App\Models\Backend\Attendance;
use App\Models\Backend\ClassSchedule;
use App\Http\Resources\NewsCollection;
use App\Http\Resources\NewsResource;
use App\Http\Resources\NoticeResource;
use App\Http\Resources\NoticeCollection;
use App\Models\Backend\Notice;
use App\Models\Backend\InstituteMessage;
use App\Models\Backend\Page;
use App\SiteInformation;
use App\Models\Backend\Staff;
use App\Models\Backend\Student;
use App\Models\Backend\Slider;
use App\Models\Backend\ExamSchedule;
use App\Syllabus;
use App\Models\Diary;
use App\Models\Backend\UpcomingEvent;
use App\Models\Backend\NoticeCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class AndroidController extends Controller
{
    public function login(Request $request)
    {
        $mobile = $request->get('mobile');
        $studentId = $request->get('studentId');
        $otp = rand(1000,9999);
        $student = Student::query()
            ->where('studentId',$studentId)
            ->where('mobile',$mobile)
            ->exists();

        if($student){
            $message = "<#> আপনার ওয়েব পয়েন্ট ভেরিফিকেশন কোড ".$otp."\nদয়া করে কোডটি গোপন রাখুন dFPFWKrPd0B";
        }else{
            $message = "<#> আপনার ওয়েব পয়েন্ট ভেরিফিকেশন কোড ".$otp."\nদয়া করে কোডটি গোপন রাখুন dFPFWKrPd0B";
        }

        $this->sms($mobile,$message);

        return ['otp_pin'=>$otp];
    }

    public function systemInfo()
    {
        return SiteInformation::query()->findOrFail(1);
    }

    public function attendance(Request $request)
    {
        $dateFrom = Carbon::parse($request->get('dateFrom'))->startOfDay();
        $dateTo = Carbon::parse($request->get('dateTo'))->endOfDay();
//        $registrationId = $request->get('registrationId');
        $attendances = Attendance::query()
            ->where('registration_id',1662622)
            ->whereBetween('date',[$dateFrom,$dateTo])
            ->get();

        $attendanceToday = Attendance::query()
            ->where('registration_id',1662622)
            ->whereDate('date',now()->format('Y-m-d'))
            ->first();

        if($attendances) {
            $data = [];
            foreach ($attendances as $attendance){
                $data[] = [
                    'id' => $attendance->id,
                    'date' => date('d-m-Y', strtotime($attendance->date)),
                    'inTime' => $attendance->entry,
                    'outTime' => $attendance->exit,
                    'status' => $attendance->status,
                ];
            }
            return response()->json([
                'status' => true,
                'today' =>[
                    'date' => date('d-m-Y', strtotime(now())),
                    'inTime' => $attendanceToday->entry ?? '',
                    'outTime' => $attendanceToday->exit ?? '',
                    'status' => $attendanceToday->status ?? '',
                ],
                'dateFrom' => date('d-m-Y', strtotime($dateFrom)),
                'dateTo' => date('d-m-Y', strtotime($dateTo)),
                'shiftFrom' => '10:00:00',
                'shiftTo' => '06:00:00',
                'attendances' => $data
            ]);
        }
    }

    public function about()
    {
        $about = InstituteMessage::query()->where('alias','about')->first();
        if($about){
            return response()->json([
                'status' => true,
                'about' => $about->body,
                'image' => null
            ]);
        }
        else{
            return response(null,204);
        }

    }

    public function chairmanMessage()
    {
        $chairmanMessage = InstituteMessage::query()->where('alias','chairman')->first();
        if($chairmanMessage){
            return response()->json([
                'status'=>true,
                'message'=>[
                    'name'=> $chairmanMessage->title,
                    'quote' => $chairmanMessage->body,
                    'designation' => "Chairman",
                    'image' =>$chairmanMessage->image ? asset('uploads/message/' . $chairmanMessage->image) : null
                ],
            ]);
        }
        else{
            return response(null,204);
        }

    }

    public function principalMessage()
    {
        $principalMessage = InstituteMessage::query()->where('alias','principal')->first();
        if($principalMessage){
            return response()->json([
                'status'=>true,
                'message'=>[
                    'name'=> $principalMessage->title,
                    'quote' => $principalMessage->body,
                    'designation' => "Principal",
                    'image' =>$principalMessage->image ? asset('uploads/message/' . $principalMessage->image) : null
                ],

            ]);
        }
        else{
            return response(null,204);
        }

    }

    public function profile(Request $request)
    {
        $profile = Student::where('studentId', 'N0110')->first();
        if ($profile){
            return response()->json([
                'status'=>true,
                'student'=>[
                    'personal'=>[
                        'name'=> $profile->name ?? '',
                        'student_id'=> $profile->studentId ?? '',
                        'picture'=>$profile->image ? asset('storage/uploads/students').'/'.$profile->image : null,
                        'class'=> $profile->class->name ?? '',
                        'rank'=> $profile->rank ?? '',
                        'status'=> $profile->status == 1 ? 'Active' : 'Inactive',
                        'dob'=> date('d-m-Y', strtotime($profile->dob)) ?? '',
                        'blood'=> $profile->bloodGroup->name ?? '',
                        'religion'=> $profile->religion->name ?? '',
                        'nationality'=> 'Bangladeshi',
                        'mobile'=> $profile->mobile ?? '',
                        'email'=> $profile->email ?? '',
                    ],
                    'father'=>[
                        'name'=>$profile->father->f_name ?? '',
                        'mobile'=>$profile->father->f_mobile ?? '',
                        'occupation'=>$profile->father->f_occupation ?? '',
                    ],
                    'mother'=>[
                        'name'=>$profile->mother->m_name ?? '',
                        'mobile'=>$profile->mother->m_mobile ?? '',
                        'occupation'=>$profile->mother->m_occupation ?? '',
                    ],
                    'address'=>[
                        'city'=> $profile->city->name ?? '',
                        'country'=> $profile->country->name ?? '',
                        'postcode'=> $profile->zip ?? '',
                        'address'=> $profile->address ?? '',
                    ]
                ],

            ]);
        }
        else{
            return response(null,204);
        }

    }

    public function syllabus(Request $request)
    {
        $student = Student::query()->where('studentId',$request->studentId)->latest()->first();
        $syllabus = Syllabus::query()->where('academic_class_id',$student->academic_class_id)->first();
        return ['file'=>asset('assets/syllabus').'/'.$syllabus->file];
    }

    public function noticeList()
    {
        $notices = Notice::query()->where('notice_type_id',2)->paginate(8);
        if($notices){
            return new NoticeCollection($notices);
        }
        else{
            return response(null,204);
        }
    }

    public function noticeDetails(Request $request)
    {
        $notice = Notice::query()
            ->where('id',$request->id)
            ->where('notice_type_id',2)
            ->first();
        $noticeCategory =  NoticeCategory::find($notice->notice_category_id);
        if($notice){
            return [
                'status'=>true,
                'notice' => [
                    'title' => $notice->title,
                    'body' => $notice->description,
                    'date' => date('d-m-Y', strtotime($notice->created_at)),
                    'category' => $noticeCategory->name ?? null,
                    'type' => $notice->notice_type_id == 1 ? 'News' : 'Notice',
                    'image' => $notice->file ? asset('storage/uploads/notice/' . $notice->file) : null,
                    'download_link' => null,
                    'facebook_link' => null,
                    'twitter_link' => null,
                    'linkedin_link' => null,
                ]
            ];
        }
        else{
            return response(null,204);
        }
    }

    public function newsList()
    {
        $newsList = Notice::query()->where('notice_type_id',1)->paginate();
        if($newsList){
            return new NewsCollection($newsList);
        }
        else{
            return response(null,204);
        }
    }

    public function newsDetails(Request $request)
    {
        $news = Notice::query()
            ->where('id',$request->id)
            ->where('notice_type_id',1)
            ->first();
        if($news){
            $noticeCategory =  NoticeCategory::find($news->notice_category_id);
            return [
                'status'=>true,
                'news' =>[
                    'title' => $news->title,
                    'body' => $news->description,
                    'date' => date('d-m-Y', strtotime($news->created_at)),
                    'category' => $noticeCategory->name,
                    'type' => $news->notice_type_id == 1 ? 'News' : 'Notice',
                    'image' => asset('storage/uploads/notice/' . $news->file),
                    'download_link' => null,
                    'facebook_link' => null,
                    'twitter_link' => null,
                    'linkedin_link' => null,
                ],
            ];
        }
        else{
            return response(null,204);
        }
    }

    public function classRoutine()
    {
        $routines = ClassSchedule::query()
            ->where('academic_class_id',1)
            ->get()
            ->groupBy('day');
        $r = [];
        foreach($routines as $key => $routine){
            $hours = [];
            foreach($routine as $rou){
                $hours[] = [
                    'name' => $rou->name,
                    'start' => $rou->start,
                    'end' => $rou->end,
                    'subject' => $rou->subject->name,
                    'isBreak'=>false
                ];
            }
            $r[] = [
                'id' => 1,
                'weekday' => $key,
                'hours' => $hours
            ];
        }

        return response()->json(['status'=>true,'routine'=>$r]);
    }

    public function sms($number,$message)
    {
        $api_key = "C20044595d74d3f12b7ec2.28527507";
        //$contacts = $number;
        $senderid = 8809601000500;
        //$sms = urlencode($message);
        $URL = "http://esms.mimsms.com/smsapi?api_key=".$api_key."&type=text&contacts=".$number."&senderid=".$senderid."&msg=".urlencode($message);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$URL);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_POST, 0);
        try{
            $output = $content = curl_exec($ch);
            //print_r($output);
        }catch(Exception $ex){
            $output = "-100";
        }
        //return $output;
    }

    public function events()
    {
        return new EventsCollection(UpcomingEvent::paginate(10));
    }

    public function eventDetails(Request $request)
    {
        $event = UpcomingEvent::query()
            ->where('id',$request->id)
            ->first();
        if($event){
            return [
                'status' => true,
                'event'=>[
                    'title' => $event->title,
                    'body' => $event->details,
                    'date' => date('d-m-Y', strtotime($event->date)),
                    'location' => $event->venue,
                    'image' => asset('assets/img/events').'/'.$event->image
                ],

            ];
        }
        else{
            return response(null,204);
        }

    }

    public function teachers()
    {
        return new TeacherCollection(Staff::query()->where('staff_type_id',2)->paginate());
    }

    public function teacherDetails(Request $request)
    {
        $teacher = Staff::query()
            ->where('staff_type_id',2)
            ->where('id',$request->id)
            ->first();
        if($teacher->count() > 0){
            return [
                'status' => true,
                'name' => $teacher->name,
                'designation' => $teacher->staff_type_id == 2 ? 'Teacher' : 'Staff',
                'phone' => $teacher->mobile,
                'empNo' => $teacher->card_id,
                'joiningDate' => $teacher->joining,
                'email' => $teacher->email,
                'image' => asset('assets/img/staffs').'/'.$teacher->image,
                'gender' => $teacher->gender->name,
                'bloodGroup' => $teacher->blood->name,
            ];
        }
        else{
            return response(null,204);
        }

    }

    public function diary(Request $request)
    {
        $date = $request->date ?? Carbon::parse()->format('Y-m-d');
        $day = Carbon::createFromFormat('Y-m-d',$date)->format('l');
        $diary = Diary::query()
            ->whereDate('date', $date)
            ->get();
        if ($diary->isNotEmpty()) {
            $data = [];
            foreach ($diary as $d) {
                $data[] = [
                    'id' => $d->id,
                    'subject' => $d->subject->name,
                    'diary' => $d->description,
                ];
            }
            return response()->json([
                'status' => true,
                'date'=>$date,
                'weekDay'=>$day,
                'diaries' => $data
            ]);
        }
        else{
            return response(null,204);
        }
    }

    public function result()
    {
        $studentAcademic = \App\Models\Backend\StudentAcademic::where('student_id', 47)->first();
//        return $studentAcademic->student;
        $examResult = ExamResult::query()
            ->where('student_academic_id',42)
            ->with('exam','studentAcademic')
            ->get();
        if ($examResult){
            $data = [];
            foreach ($examResult as $result) {
//                $AttendanceCount = Attendance::query()
//                    ->where('student_id',$result->studentAcademic->student_id)
//                    ->get();
                $TotalNumbers = DB::table('exam_schedules')
                    ->where('exam_id', $result->exam_id)
                    ->where('academic_class_id', $result->studentAcademic->academic_class_id)
                    ->selectRaw('SUM(objective_full) as obj, SUM(written_full) as wri, 
                                SUM(practical_full) as pra, SUM(viva_full) as viva')
                    ->first();

                $obj_full = $TotalNumbers->obj ?? 0;
                $written_full = $TotalNumbers->wri ?? 0;
                $practical_full = $TotalNumbers->pra ?? 0;
                $viva_full = $TotalNumbers->viva ?? 0;
                $total = $obj_full + $written_full + $practical_full + $viva_full;

                $data[] = [
                    'id' => $result->id,
                    'title' => $result->exam->name,
                    'isPassed' => $result->grade == 'F' ? false : true,
                    'result'=>[
                        [
                            'label'=> 'GPA',
                            'obtained'=> $result->gpa,
                            'total'=> '5.00',
                        ],[
                            'label'=> 'TOTAL',
                            'obtained'=> $result->total_mark,
                            'total'=>strval($total) ,
                        ],[
                            'label'=> 'ATTENDANCE',
                            'obtained'=> '35',
                            'total'=> '98',
                        ],

                    ]
                ];
            }
            return response()->json([
                'status' => true,
                'results'=>$data
            ]);
        }
        else{
            return response(null,204);
        }
    }

    public function home()
    {
        $sliders = Slider::query()->get();
        if ($sliders->isNotEmpty()){
            $data = [];
            foreach ($sliders as $slider){
                $data[] = [
                    'id'=> $slider->id,
                    'image' => $slider->image ? asset('assets/img/sliders/' . $slider->image) : null,
                ];
            }
            return response()->json([
                'status' => true,
                'sliders'=> $data
            ]);
        }
        else{
            return response(null,204);
        }
    }
}
