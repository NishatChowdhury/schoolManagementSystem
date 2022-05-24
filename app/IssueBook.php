<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IssueBook extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','book_id','is_return'];

    public function student_name(): BelongsTo
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function bookCode(): BelongsTo
    {
        return $this->belongsTo(Book::class,'book_id');
    }

    public function studentID(): BelongsTo
    {
        return $this->belongsTo(Student::class,'student_id');
    }

}
