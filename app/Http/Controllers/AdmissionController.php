<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\AppliedStudent;
use App\Classes;
use App\CommunicationSetting;
use App\Group;
use App\MeritList;
use App\Repository\StudentRepository;
use App\Session;
use App\SiteInformation;
use App\Student;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    /**
     * @var StudentRepository
     */
    public $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function store(Request $request)
    {
        $ssc_roll = $request->get('ssc_roll');

        $rolls = AppliedStudent::query()->get('ssc_roll')->toArray();

        //dd($rolls);

        foreach($rolls as $ssc_roll){
            $student = AppliedStudent::query()->where('ssc_roll',$ssc_roll)->first();

            $academicClassId = AcademicClass::query()
                ->where('session_id',$student->session_id)
                ->where('class_id',$student->class_id)
                ->where('group_id',$student->group_id)
                ->where('section_id',$student->section_id)
                ->first();

            $optional = json_decode($student->subjects)->optional[0];

            $data = [
                'name' => $student->name,
                'studentId' => $student->studentId,
                'academic_class_id' => $academicClassId->id,
                'session_id' => $student->session_id,
                'class_id' => $student->class_id,
                'section_id' => $student->section_id,
                'group_id' => $student->group_id,
                'rank' => 0,
                'subject_id' => $optional,
                'father' => $student->father,
                'mother' => $student->mother,
                'gender_id' => $student->gender_id,
                'mobile' => $student->mobile,
                'dob' => $student->dob,
                'blood_group_id' => $student->blood_group_id,
                'religion_id' => $student->religion_id,
                'image' => $student->image,
                'address' => $student->pre_house_number.', '.$student->pre_road,
                'area' => $student->pre_village,
                'zip' => $student->pre_post_code,
                'city_id' => null,
                'country_id' => 1,
                'email' => $student->email,
                'father_mobile' => $student->guardian_mobile,
                'mother_mobile' => null,
                'notification_type_id' => null,
                'status' => 1,
                'bcn' => null,
                'father_occupation' => null,
                'mother_occupation' => null,
                'other_guardian' => null,
                'guardian_national_id' => null,
                'yearly_income' => null,
                'guardian_address' => null,
                'bank_slip' => null,
                'ssc_roll' => $student->ssc_roll,
                'location_id' => $student->location_id,
            ];

            $isExist = Student::query()->where('ssc_roll',$student->ssc_roll)->exists();

            if($isExist){
                $s = Student::query()->where('ssc_roll',$student->ssc_roll)->first();
                $s->update();
            }else{
                Student::query()->create($data);
                $student->update(['approved'=>1]);
                $admission_sms = SiteInformation::query()->where('admission_confirm_sms',1)->exists();
                //if($admission_sms) {
                    //$this->sms($data);
                //}
            }
        }

        \Illuminate\Support\Facades\Session::flash('success','Admission completed successfully!');

        return redirect()->back();
    }

    public function admissionExams()
    {
        return view('admin.admission.admission-exam');
    }

    public function admissionApplicant()
    {
        return view('admin.admission.applicant');
    }

    public function admissionExamResult()
    {
        return view('admin.admission.admission-exam-result');
    }

    public function browseMeritList(Request $request)
    {
        //dd($request->get('ssc_roll') != null);
        $s = MeritList::query();

        if($request->has('name') && $request->get('name') != null){
            $s->where('name','like','%'.$request->get('name').'%');
        }

        if($request->has('ssc_roll') && $request->get('ssc_roll') != null){
            $s->where('ssc_roll',$request->get('ssc_roll'));
        }

        if($request->has('group_id') && $request->get('group_id') != null){
            $s->where('group_id',$request->get('group_id'));
        }

        if($request->has('status') && $request->get('status') != null){
            $status = $request->get('status');
            if($status == 0){
                $s->whereDoesntHave('applied');
            }elseif($status == 2){
                $s->whereHas('applied',function($query){
                    $query->where('approved',1);
                });
            }else{
                $s->whereHas('applied',function($query){
                    $query->where('approved',null);
                });
            }
        }

        $applied = AppliedStudent::query()->count();
        $approved = AppliedStudent::query()->where('approved',1)->count();

        $students = $s->paginate(50);

        $repository = $this->repository;
        return view('admin.admission.browse',compact('students','repository','applied','approved'));
    }

    public function uploadMeritList()
    {
        $sessions = Session::query()->where('active',1)->pluck('year','id');
        $classes = Classes::query()->pluck('name','id');
        $groups = Group::query()->pluck('name','id');
        return view('admin.admission.upload',compact('sessions','classes','groups'));
    }

    public function upload(Request $request)
    {
        $file = file($request->file('list'));
        $sl = 0;
        foreach($file as $row){
            if($sl != 0){
                $col = explode(',',$row);

                $data['session_id'] = $request->get('session_id');
                $data['class_id'] = $request->get('class_id');
                $data['group_id'] = $request->get('group_id');
                $data['ssc_roll'] = $col[0];
                $data['board'] = $col[1];
                $data['passing_year'] = $col[2];
                $data['name'] = $col[3];
                //$data['status'] = $col[4];

                $isExist = MeritList::query()
                    ->where('ssc_roll',$data['ssc_roll'])
                    ->first();

                if($isExist){
                    $isExist->update($data);
                }else{
                    MeritList::query()->create($data);
                }
            }
            $sl++;
        }

       \Illuminate\Support\Facades\Session::flash('success','Merit List Uploaded Successfully');

        return redirect()->back();
    }

    public function unapprove($roll)
    {
        //dd($roll);
        //549069
        $student = AppliedStudent::query()->where('ssc_roll',$roll)->first();
        $student->update(['approved'=>null]);
        return redirect()->back();
    }

    public function slipView(Request $request)
    {
        $id = $request->get('id');
        $student = Student::query()->findOrNew($id);
        return view('admin.admission._slip',compact('student'));
    }

    public function sms($data)
    {
        $api_key = smsConfig('api_key');
        $contacts = $data['mobile'];
        $senderid = smsConfig('sender_id');
        //$sms = $request->get('message');
        $sms = 'Congratulation! Your application is approved. Now you are a student of '.siteConfig('title').'. Your student ID is '.$data['studentId'];

        $URL = "http://bangladeshsms.com/smsapi?api_key=".urlencode($api_key)."&type=text&contacts=".urlencode($contacts)."&senderid=".urlencode($senderid)."&msg=".urlencode($sms);

        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_HTTPHEADER, ['Content-Type: text/html; charset=UTF-8']);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ($ch, CURLOPT_URL, $URL);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);

    }
}
