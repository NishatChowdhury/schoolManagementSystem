<?php

namespace App\Console\Commands;

use App\RawAttendance;
use App\Student;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;

class AttendanceSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronJob:AttendanceSMS';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send attendance SMS after download attendances';

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
        //1866177444 number of S202000001
        //1918815613 number of S202000002
        //1710420854 number of S202000003
        //1556570714 number of S202000004
        $students = Student::query()->where('status',1)->get();

        foreach($students as $student){
            $isPresent = RawAttendance::query()
                ->where('registration_id',$student->studentId)
                ->where('access_date','like','%'.Carbon::today()->format('Y-m-d').'%')
                ->where('sms_sent',0)
                ->first();

            if($isPresent){
                $msg = 'Dear Parent, your ward entry time is '.$isPresent->access_time->format('H:i:s');
                $this->send($student,$msg);
            }else{
                $msg = 'Dear Parent, you ward is absent without any prior notice.';
            }

//            $this->send($student,$msg);

        }

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
        curl_exec($ch);

        try{
            //$output = $content=curl_exec($ch);
            //print_r($output);

            $allAttendances = RawAttendance::query()
                ->where('registration_id',$student->studentId)
                ->where('access_date','like','%'.Carbon::today()->format('Y-m-d').'%')
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
