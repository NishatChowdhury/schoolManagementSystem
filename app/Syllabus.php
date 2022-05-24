<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    protected $table ='syllabus';

    protected $fillable = ['academic_class_id','session_id','title','file'];

    public function academicClass(){
        return $this->belongsTo(AcademicClass::class);
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class);
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
