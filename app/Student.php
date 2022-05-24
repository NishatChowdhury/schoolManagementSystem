<?php

namespace App\Models\Backend;

use App\Models\Backend\FeeSetupStudent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Student extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $dates = ['dob'];

    protected $fillable = [
        'name',
        'studentId',
        'academic_class_id',
        'session_id',
        'class_id',
        'section_id',
        'group_id',
        'rank',
        'subject_id',
        'father',
        'mother',
        'gender_id',
        'mobile',
        'dob',
        'blood_group_id',
        'religion_id',
        'image',
        'address',
        'area',
        'zip',
        //'division_id',
        //'state_id',
        'city_id',
        'country_id',
        'email',
        'father_mobile',
        'mother_mobile',
        'notification_type_id',
        'status',
        'bcn',
        'father_occupation',
        'mother_occupation',
        'other_guardian',
        'guardian_national_id',
        'yearly_income',
        'guardian_address',
        'bank_slip',
        'ssc_roll',
        'location_id',
        'shift_id',
        'subjects',
        'ssc_roll',
        'ssc_registration',
        'ssc_session',
        'ssc_year',
        'ssc_board'
    ];

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class,'academic_class_id');
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class,'class_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function sessions()
    {
        return $this->belongsTo(Session::class,'session_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function bloodGroup(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BloodGroup::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function payable($id){
        return StudentPayment::query()->where('student_id',$id)->sum('setup_amount');
    }

    public function paid($id){
        return StudentPayment::query()->where('student_id',$id)->sum('paid_amount');
    }

    public function fine($id){
        return StudentPayment::query()->where('student_id',$id)->sum('fine');
    }

    public function discount($id){
        return StudentPayment::query()->where('student_id',$id)->sum('discount');
    }

    public function admission()
    {
        return $this->belongsTo(AppliedStudent::class,'ssc_roll','ssc_roll');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class,'shift_id');
    }

    public function attendances(){
        return $this->hasMany(RawAttendance::class,'registration_id','studentId');
    }

    public function feeSetup()
    {
        return $this->hasMany(FeeSetup::class);
    }
    public function fee_setup_pivot()
    {
        return $this->hasMany(FeeSetupPivot::class);
    }

    public function academicClasses()
    {
        return $this->belongsTo(Classes::class,'class_id');
    }

    public function month()
    {
        return $this->belongsTo(Month::class);
    }

}
