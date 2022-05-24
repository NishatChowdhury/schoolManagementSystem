<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FM extends Model
{
    protected $table = 'fm';

    protected $fillable = ['session_id','exam_id','class_id','section_id','group_id','subject_id','student_id','studentId','full_mark','objective','written','practical','viva','total_mark','gpa','grade'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class,'class_id');
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
