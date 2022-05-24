<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    protected $table ='student_payments';
    protected $fillable =['student_id','fee_setup_id','payment_date','balance','payment_method','paid_amount'];

    public function fee_categories(){
        return $this->belongsToMany(FeeCategory::class,'payment_pivots')->withPivot('amount');
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function sessions()
    {
        return $this->belongsTo(Session::class,'session_id');
    }
}
