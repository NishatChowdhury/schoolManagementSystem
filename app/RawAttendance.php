<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawAttendance extends Model
{
    protected $dates = ['access_time'];

    protected $fillable = ['registration_id','unit_name','user_name','access_date','access_time','access_id','department','unit_id','card','processed','sms_sent'];

    public function student()
    {
        return $this->belongsTo(Student::class,'registration_id','studentId');
    }
}
