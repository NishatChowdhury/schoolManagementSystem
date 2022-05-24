<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $dates = ['access_date','date'];

    protected $fillable = ['registration_id','unit_name','user_name','date','access_id','department','unit_id','card','late','early','status','student_id','entry','exit','sms_sent'];

    public function student()
    {
        return $this->belongsTo(Student::class,'registration_id','studentId');
    }
}
