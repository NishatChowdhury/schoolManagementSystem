<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = ['academic_class_id','session_id','exam_id','class_id','section_id','group_id','subject_id','student_id','studentId','full_mark','objective','written','practical','viva','total_mark','gpa','grade','grade_id'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
