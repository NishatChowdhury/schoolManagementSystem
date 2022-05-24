<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentLeave extends Model
{
    use HasFactory;

    protected $dates = ['date'];

    protected $fillable = ['leaveId','student_id','date','leave_purpose_id'];

    /**
     * A leave is belongs to a leave purpose
     * @return BelongsTo
     */
    public function purpose(): BelongsTo
    {
        return $this->belongsTo(LeavePurpose::class,'leave_purpose_id');
    }

    /**
     * A leave is belongs to leave purpose
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
