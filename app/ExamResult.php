<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    protected $fillable = ['academic_class_id','session_id','exam_id','class_id','section_id','group_id','student_id','total_mark','gpa','grade','rank'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class);
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class,'class_id');
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
