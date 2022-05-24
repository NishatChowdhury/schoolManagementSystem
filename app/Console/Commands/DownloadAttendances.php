<?php

namespace App\Console\Commands;

use App\Attendance;
use App\RawAttendance;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DownloadAttendances extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronJob:DownloadAttendances';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download attendance record from cloud';

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
     * @return mixed
     */
    public function handle()
    {
        date_default_timezone_set('Asia/Dhaka');

        $data = [
            "operation" => env('STELLAR_OPERATION',''),
            "auth_user" => env('STELLAR_USERNAME',''),
            "auth_code" => env('STELLAR_AUTH_CODE',''),
            "start_date" => Carbon::today()->format('Y-m-d'),
            "end_date" => Carbon::today()->format('Y-m-d'),
            "start_time" => Carbon::createFromTime(00,00,00)->format('H:i:s'),
            "end_time" => Carbon::createFromTime(23,59,59)->format('H:i:s'),
            //"access_id" => env('STELLAR_ACCESS_ID',''),
        ];

        $datapayload = json_encode($data);

        $api_request = curl_init('https://rumytechnologies.com/rams/json_api');
        curl_setopt($api_request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($api_request, CURLINFO_HEADER_OUT, true);
        curl_setopt($api_request, CURLOPT_POST, true);
        curl_setopt($api_request, CURLOPT_POSTFIELDS, $datapayload);
        curl_setopt($api_request, CURLOPT_HTTPHEADER, array(
                'Content-Type:application/json',
                'Content-Length: '.strlen($datapayload))
        );
        $result = curl_exec($api_request);
        //$replace_syntax = str_replace('{"log":',"",$result);

        $getvalue = json_decode($result);

        foreach($getvalue->log as $row){

            ini_set('max_execution_time',30);

            $isExists = RawAttendance::query()->where('access_id',$row->access_id)->exists();

            if(!$isExists){
                $attendance = new RawAttendance();
                $attendance->registration_id = $row->registration_id;
                $attendance->unit_name = $row->unit_name;
                $attendance->user_name = $row->user_name;
                //$attendance->access_date = date('Y-m-d H:i:s', strtotime($row->access_date . $row->access_time));
                $attendance->access_date = $row->access_date;
                $attendance->access_time = $row->access_time;
                $attendance->access_id = $row->access_id;
                $attendance->department = $row->department;
                $attendance->unit_id = $row->unit_id;
                $attendance->card = $row->card;
                $attendance->processed = 0;
                $attendance->sms_sent = 0;

                $attendance->save();
            }
        }

        //dd('data saved successfully');
    }
}
