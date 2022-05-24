<?php

namespace App\Http\Controllers;

use App\AppliedStudent;
use App\CommunicationSetting;
use App\Session;
use App\SiteInformation;
use App\Student;
use Exception;
use Illuminate\Http\Request;

class AppliedStudentController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'session_id'=>'required',
            'class_id'=>'required',
            'group_id'=>'required',
            //'studentId'=>'required',
            'ssc_roll'=>'required',
            'name'=>'required',
            'gender_id'=>'required',
            'dob'=>'required',
            'brcn'=>'required',
            'blood_group_id'=>'required',
            'religion_id'=>'required',
            //'preferred_group'=>'required',
            'marital_status'=>'required',
            'nid'=>'required',
            //'location_id'=>'required',
            'father'=>'required',
            'mother'=>'required',
            'guardian_name'=>'required',
            'father_occupation'=>'required',
            'relation_with_guardian'=>'required',
            'yearly_income'=>'required|numeric',
            'total_member'=>'required',
            'guardian_nid'=>'required',
            'mobile'=>'required',
            'email'=>'required|email',
            'guardian_mobile'=>'required',
            'cocurricular'=>'required',
            'hobby'=>'required',
            'quota'=>'required',
            'pre_house_number'=>'required',
            'pre_village'=>'required',
            'pre_road'=>'required',
            'pre_post_office'=>'required',
            'pre_post_code'=>'required',
            'pre_thana'=>'required',
            'pre_district'=>'required',
            'per_house_number'=>'required',
            'per_village'=>'required',
            'per_road'=>'required',
            'per_post_office'=>'required',
            'per_post_code'=>'required',
            'per_thana'=>'required',
            'per_district'=>'required',
            'ssc_board'=>'required',
            'ssc_year'=>'required',
            'ssc_registration'=>'required',
            'ssc_session'=>'required',
            'student_type'=>'required',
            'ssc_gpa'=>'required',
            'ssc_group'=>'required',
            'ssc_school'=>'required',
            //'pic'=>'required',
        ]);

        $data = $request->except('pic','slip');
        $data['status'] = 3;

        if ($request->hasFile('pic')){
            $image = $request->studentId.'.'.$request->file('pic')->getClientOriginalExtension();
            $request->file('pic')->move(public_path().'/assets/img/students/', $image);
            $data = $request->except('pic');
            $data['image'] = $image;
            $data['status'] = 3;
//            try{
//                Student::query()->create($data);
//            }catch (\Exception $e){
//                dd($e);
//            }
        }
        if ($request->hasFile('slip')){
            $image = $request->studentId.'.'.$request->file('slip')->getClientOriginalExtension();
            $request->file('slip')->move(public_path().'/assets/img/slip/', $image);
            $data = $request->except('slip');
            $data['bank_slip'] = $image;
            $data['status'] = 3;
//            try{
//                Student::query()->create($data);
//            }catch (\Exception $e){
//                dd($e);
//            }
        }

        $data['subjects'] = json_encode(
            [
                'compulsory' => [$request->fc,$request->sc,$request->tc],
                'selective' => [$request->fs,$request->ss,$request->ts],
                'optional' => [$request->optional]
            ]
        );

        $student = AppliedStudent::query()->where('ssc_roll',$request->get('ssc_roll'))->first();

        if($student){
            $student->update($data);
        }else{
            AppliedStudent::query()->create($data);
            $admission_sms = SiteInformation::query()->where('admission_sms',1)->exists();
            if($admission_sms) {
                $this->sms($data);
            }
        }

        return redirect('admission-success')->withErrors(compact('data'));
    }

    public function loadStudentId(Request $request){
        $academicYear = substr(trim(Session::query()->where('id',$request->academicYear)->first()->year),-2);

        $prefix = substr($request->get('groups'),0,1);

        $incrementId = AppliedStudent::query()->max('id');
        $increment = $incrementId + 1;

        $studentId = $prefix.$academicYear.$increment;
        return $studentId;
    }

    public function studentView(Request $request)
    {
        $roll = $request->get('roll');
        $student = AppliedStudent::query()->where('ssc_roll',$roll)->first();

        if(!$student){
            return response('<h3 class="text-danger text-center">Student not found in <b>Applied Student</b> database!</h3>');
            //abort(404,'Student not found in applied database!');
        }

        $subjects = json_decode($student->subjects);

        return view('admin.admission._student-view',compact('student','subjects'));
    }

    public function sms($data)
    {
        $api_key = smsConfig('api_key');
        $contacts = $data['mobile'];
        $senderid = smsConfig('sender_id');
        //$sms = $request->get('message');
        $sms = $data['name'].' your form has been successfully submitted to '.siteConfig('title').'. Your student ID is '.$data['studentId'];

        $URL = "http://bangladeshsms.com/smsapi?api_key=".urlencode($api_key)."&type=text&contacts=".urlencode($contacts)."&senderid=".urlencode($senderid)."&msg=".urlencode($sms);

        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_HTTPHEADER, ['Content-Type: text/html; charset=UTF-8']);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ($ch, CURLOPT_URL, $URL);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);

//        try{
//            $output = $content=curl_exec($ch);
//            print_r($output);
//        }catch(Exception $ex){
//            $output = "-100";
//        }
    }


}
