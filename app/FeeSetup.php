<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeeSetup extends Model
{
    protected $fillable = ['academic_class_id','student_id','month_id','year'];

    public function category(){
        return $this->belongsTo(FeeCategory::class,'fee_category_id');
    }

    public function fee_categories(){
            return $this->belongsToMany(FeeCategory::class,'fee_pivots')->withPivot('amount');
    }

    public function pivot_fees(){
        return $this->hasMany(FeePivot::class);
    }

    public function session(){
        return $this->belongsTo(Session::class);
    }

    public function academicClass()
    {
        return $this->belongsTo(Classes::class);
    }

    // public function studentID()
    // {
    //     return $this->belongsTo(Student::class,'student_id');
    // }

    public function feeSetupPivot(){
        return $this->hasMany(FeeSetupPivot::class);
    }

    /**
     * A fee setup is belongs to a student
     *
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * A fee setup is belongs to a month
     *
     * @return BelongsTo
     */
    public function month(): BelongsTo
    {
        return $this->belongsTo(Month::class);
    }
/**
     * A fee setup is belongs to a Section
     *
     * @return BelongsTo
     */
    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

}
