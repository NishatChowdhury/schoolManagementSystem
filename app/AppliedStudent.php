<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppliedStudent extends Model
{
    protected $fillable = [
        'session_id',
        'class_id',
        'group_id',
        'studentId',
        'ssc_roll',
        'name',
        'gender_id',
        'dob',
        'brcn',
        'blood_group_id',
        'religion_id',
        //'preferred_group',
        'marital_status',
        'nid',
        'location_id',
        'father',
        'mother',
        'guardian_name',
        'father_occupation',
        'relation_with_guardian',
        'yearly_income',
        'total_member',
        'guardian_nid',
        'mobile',
        'email',
        'guardian_mobile',
        'cocurricular',
        'hobby',
        'quota',
        'pre_house_number',
        'pre_village',
        'pre_road',
        'pre_post_office',
        'pre_post_code',
        'pre_thana',
        'pre_district',
        'per_house_number',
        'per_village',
        'per_road',
        'per_post_office',
        'per_post_code',
        'per_thana',
        'per_district',
        'ssc_board',
        'ssc_year',
        'ssc_registration',
        'ssc_session',
        'student_type',
        'ssc_gpa',
        'ssc_group',
        'ssc_school',
        'image',
        'subjects',
        'approved'
    ];

    function location(){
        return $this->belongsTo(Location::class);
    }
}
