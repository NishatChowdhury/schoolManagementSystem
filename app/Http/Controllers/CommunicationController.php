<?php

namespace App\Http\Controllers;

use App\CommunicationHistory;
use App\Repository\StudentRepository;
use App\Staff;
use App\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommunicationController extends Controller
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

    public function student(Request $request, Student $student)
    {
        if($request->all()){
            $s = $student->newQuery();
            if($request->get('studentId')){
                $studentId = $request->get('studentId');
                $s->where('studentId',$studentId);
            }
            if($request->get('session_id')){
                $session = $request->get('session_id');
                $s->where('session_id',$session);
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
        $repository = $this->repository;
        return view('admin.communication.student-sms',compact('repository','students'));
    }

    public function quick()
    {
        return view('admin.communication.quick');
    }

    public function staff(Request $request)
    {
        $staffs = Staff::query()->where('staff_type_id',$request->staff_type_id)->get();
        return view('admin.communication.staff-sms',compact('staffs'));
    }

    public function history()
    {
        $histories = CommunicationHistory::query()->latest()->paginate(50);
        return view('admin.communication.history-sms',compact('histories'));
    }

    public function send(Request $request)
    {
        $ids = $request->get('id');
        $group = $request->get('group');
        if($group == 'staff'){
            $numbers = Staff::query()->whereIn('id',$ids)->pluck('mobile')->toArray();
        }else{
            $numbers = Student::query()->whereIn('id',$ids)->pluck('mobile')->toArray();
        }

        //$api_key = "C20051365de1fe31bd00d3.94191772";
        $api_key = smsConfig('api_key');
        $contacts = implode('+',$numbers);
        //$contacts = $request->get('number');
        //$senderid = 8809601000500;
        $senderid = smsConfig('sender_id');
        $sms = $request->get('message');
        //dd($contacts);
        $URL = "http://bangladeshsms.com/smsapi?api_key=".urlencode($api_key)."&type=text&contacts=".$contacts."&senderid=".urlencode($senderid)."&msg=".urlencode($sms);
        //$URL = "http://bangladeshsms.com/smsapi?api_key=".urlencode($api_key)."&type=text&contacts=".urlencode($contacts)."&senderid=".urlencode($senderid)."&msg=".urlencode($sms);

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

        $data['type'] = 'Notice';
        $data['user_id'] = auth()->id();
        $data['destination_count'] = count($numbers);
        $data['sms_count'] = $request->get('sms_count');
        $data['numbers'] = $contacts;
        $data['message'] = $sms;
        $data['status'] = '1';
        CommunicationHistory::query()->create($data);
        //dd($output);

        Session::flash('success','SMS sent!');

        return redirect()->back();
    }

    public function quickSend(Request $request)
    {
        //$ids = $request->get('id');
        //$numbers = Student::query()->whereIn('id',$ids)->pluck('mobile')->toArray();

        //$api_key = "C20051365de1fe31bd00d3.94191772";
        $api_key = smsConfig('api_key');
        //$contacts = implode('+',$numbers);
        $contacts = $request->get('numbers');
        //$senderid = 8809601000500;
        $senderid = smsConfig('sender_id');
        $sms = $request->get('message');
        //dd($contacts);
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

        $data['type'] = 'Quick';
        $data['user_id'] = auth()->id();
        $data['destination_count'] = count(explode('+',$contacts));
        $data['sms_count'] = $request->get('sms_count');
        $data['numbers'] = $contacts;
        $data['message'] = $sms;
        $data['status'] = '1';
        CommunicationHistory::query()->create($data);
        //dd($output);

        Session::flash('success','SMS sent!');

        return redirect()->back();
    }

}
