<?php

namespace App\Console\Commands;

use App\Attendance;
use App\RawAttendance;
use App\Student;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GenerateAttendances extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronJob:GenerateAttendances';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate attendances from raw table to real table';

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
        $today = Carbon::today()->format('Y-m-d');
        foreach($students as $student){
            $isExist = RawAttendance::query()
                ->where('processed',0)
                ->where('registration_id',$student->studentId)
                ->where('access_date','like','%'.$today.'%')
                ->exists();

            if($isExist){
                $date = RawAttendance::query()
                    ->where('processed',0)
                    ->where('registration_id',$student->studentId)
                    ->get()
                    ->groupBy('access_date');
                foreach($date as $attendances){
                    foreach($attendances as $attendance){
                        $min = $attendances->min('access_time');
                        $max = $attendances->max('access_time');
                        $hasAttendance = Attendance::query()->where('student_id',$student->id)->where('date',$attendance->access_date)->first();
                        $data = [
                            'registration_id' => $attendance->registration_id,
                            'access_id' => $attendance->access_id,
                            'card' => $attendance->card,
                            'unit_name' => $attendance->unit_name,
                            'student_id' => $student->id,
                            'staff_id' => null,
                            'date' => $attendance->access_date,
                            'entry' => $min->format('H:i:s'),
                            'exit' => $max->format('H:i:s'),
                            'late' => null,
                            'early' => null,
                            'status' => 'P',
                            'sms_sent' => 0,
                        ];

                        if($hasAttendance == null){
                            Attendance::query()->create($data);
                            $attendance->update(['processed'=>1]);
                        }else{
                            //$hasAttendance->update($data); TODO: fixed it after showing demo. compare edit time with existing time.
                            $attendance->update(['processed'=>1]);
                        }
                        //dd(!$hasAttendance);
                    }
                    //dd('$max');
                }
            }else{
                $hasAttendance = Attendance::query()->where('student_id',$student->id)->where('date','like','%'.$today.'%')->first();

                $data = [
                    'registration_id' => $student->studentId,
                    'access_id' => null,
                    'card' => null,
                    'unit_name' => null,
                    'student_id' => $student->id,
                    'staff_id' => null,
                    'date' => $today,
                    'entry' => null,
                    'exit' => null,
                    'late' => null,
                    'early' => null,
                    'status' => "A",
                    'sms_sent' => 0,
                ];

                if($hasAttendance == null){
                    Attendance::query()->create($data);
                    //$attendance->update(['processed'=>1]);
                }else{
                    $hasAttendance->update($data);
                    //$attendance->update(['processed'=>1]);
                }

                //Attendance::query()->create($data);
            }
        }
        //dd('one');
        return 0;
    }
}
