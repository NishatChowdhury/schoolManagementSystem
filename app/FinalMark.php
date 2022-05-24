<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalMark extends Model
{
    protected $fillable = ['session_id','exam_id','class_id','section_id','group_id','subject_id','student_id','studentId','full_mark','objective','written','practical','viva','total_mark','gpa','grade'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
