<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model
{
    protected $fillable = ['session_id', 'exam_id', 'class_id', 'subject_id', 'teacher_id', 'date', 'start', 'end', 'objective_full','objective_pass', 'written_full','written_pass', 'practical_full','practical_pass'];

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class,'academic_class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
