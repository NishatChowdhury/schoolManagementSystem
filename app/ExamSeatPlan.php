<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamSeatPlan extends Model
{
    protected $fillable = ['exam_id','academic_class_id','room','roll_form','roll_to','count'];

    public function academicClasses()
    {
        return $this->belongsTo(AcademicClass::class,'academic_class_id');
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class,'exam_id');
    }
}
