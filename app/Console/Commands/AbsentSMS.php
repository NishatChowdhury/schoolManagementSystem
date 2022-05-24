<?php

namespace App\Console\Commands;

use App\Attendance;
use App\RawAttendance;
use App\Student;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;

class AbsentSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronJob:AbsentSMS';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $students = Student::query()->where('status',1)->get();
        $attendances = Attendance::query()->where('date','like','%'.Carbon::today()->format('Y-m-d').'%')->where('sms_sent',0)->get();
        foreach($attendances as $attendance){
            if($attendance->status == 'A'){
                //$msg = 'Dear Parent, your ward entry time is '.$isPresent->access_date->format('H:i:s');
                $msg = 'Dear Parent, you ward is absent without any prior notice.';

                $t = Carbon::createFromTime(14,27,00);
                $now = Carbon::now();
                if($t < $now){
                    $this->send($attendance->student,$msg);
                }
            }
        }

//        foreach($students as $student){
//            $isPresent = Attendance::query()
//                ->where('registration_id',$student->studentId)
//                ->where('date','like','%'.Carbon::today()->format('Y-m-d').'%')
//                ->where('sms_sent',0)
//                ->first();
//
//            if($isPresent){
//                if($isPresent->status == 'A'){
//                    //$msg = 'Dear Parent, your wand entry time is '.$isPresent->access_date->format('H:i:s');
//                    $msg = 'Dear Parent, you wand is absent without any prior notice.';
//
//                    $t = Carbon::createFromTime(01,35,00);
//                    $now = Carbon::now();
//                    if($t < $now){
//                        $this->send($student,$msg);
//                    }
//                }
//            }
//
//
//        }
        return 0;
    }

    public function send($student,$msg)
    {
        $api_key = smsConfig('api_key');
        $contacts = $student->mobile;
        $senderid = smsConfig('sender_id');
        $sms = $msg;
        $URL = "http://masking.mdlsms.com/smsapi?api_key=".urlencode($api_key)."&type=text&contacts=".$contacts."&senderid=".urlencode($senderid)."&msg=".urlencode($sms);

        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_HTTPHEADER, ['Content-Type: text/html; charset=UTF-8']);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ($ch, CURLOPT_URL, $URL);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_exec($ch);

        try{
            //$output = $content=curl_exec($ch);
            //print_r($output);

            $allAttendances = Attendance::query()
                ->where('registration_id',$student->studentId)
                ->where('date','like','%'.Carbon::today()->format('Y-m-d').'%')
                ->where('sms_sent',0)
                ->get();

            foreach($allAttendances as $attendance){
                $attendance->update(['sms_sent'=>1]);
            }

        }catch(Exception $ex){
            $output = "-100";
        }
    }
}
