<?php

namespace App\apiModel;

use App\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Otp extends Model
{
    use HasFactory;

    protected $fillable = ['student_id','otp'];

//    An otp belongs to a user
    public function student():BelongsTo
    {
        return $this->belongsTo(Student::class,'student_id');
    }
}
