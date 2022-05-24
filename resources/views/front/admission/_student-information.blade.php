<div class="tab-pane fade show active" id="student-information" role="tabpanel">
    <div class="container">
        <div class="row">

            <div class="col-12 mx-auto">

                <div class="row form-group">
                    <label for="example-text-input" class="col-2 col-form-label text-right">Session (Auto)</label>
                    <div class="col-10">
                        {{ Form::text('session',null,['class'=>'form-control','id'=>'session','readonly']) }}
                        {{ Form::hidden('session_id',null,['id'=>'session_id']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-text-input" class="col-2 col-form-label text-right">Class (Auto)</label>
                    <div class="col-10">
                        {{ Form::text('class',null,['class'=>'form-control','id'=>'classes','readonly']) }}
                        {{ Form::hidden('class_id',null,['id'=>'class_id']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-text-input" class="col-2 col-form-label text-right">Group (Auto)</label>
                    <div class="col-10">
                        {{ Form::text('group',null,['class'=>'form-control','id'=>'groups','readonly']) }}
                        {{ Form::hidden('group_id',null,['id'=>'group_id']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-text-input" class="col-2 col-form-label text-right">Student ID (Auto)</label>
                    <div class="col-10">
                        {{ Form::text('studentId',null,['class'=>'form-control','id'=>'studentID','readonly']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-text-input" class="col-2 col-form-label text-right">SSC Roll</label>
                    <div class="col-10">
                        {{ Form::text('ssc_roll',null,['class'=>'form-control','id'=>'ssc-roll','readonly']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-text-input" class="col-2 col-form-label text-right">Student Name</label>
                    <div class="col-10">
                        {{ Form::text('name',null,['class'=>'form-control','id'=>'input-name','readonly']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-search-input" class="col-2 col-form-label text-right">Gender</label>
                    <div class="col-10">
                        {{ Form::select('gender_id',$repository->genders(),null,['class'=>'form-control','id'=>'input-gender']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-email-input" class="col-2 col-form-label text-right">Date of Birth</label>
                    <div class="col-10">
                        {{ Form::date('dob',null,['class'=>'form-control','id'=>'example-date-input']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-url-input" class="col-2 col-form-label text-right">Birth Registration Certificate Number</label>
                    <div class="col-10">
                        {{ Form::text('brcn',null,['class'=>'form-control','id'=>'input-bcn']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-tel-input" class="col-2 col-form-label text-right">Blood Group</label>
                    <div class="col-10">
                        {{ Form::select('blood_group_id',$repository->bloods(),null,['class'=>'form-control','id'=>'input-blood']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-password-input" class="col-2 col-form-label text-right">Religion</label>
                    <div class="col-10">
                        {{ Form::select('religion_id',$repository->religions(),null,['class'=>'form-control','id'=>'input-religion']) }}
                    </div>
                </div>

{{--                <div class="row form-group">--}}
{{--                    <label for="example-password-input" class="col-2 col-form-label text-right">Preferred Group</label>--}}
{{--                    <div class="col-10">--}}
{{--                        {{ Form::select('preferred_group',$repository->groups(),null,['class'=>'form-control','id'=>'input-preferred-group']) }}--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="row form-group">
                    <label for="example-datetime-local-input" class="col-2 col-form-label text-right">NID No.</label>
                    <div class="col-10">
                        {{ Form::text('nid',null,['class'=>'form-control','id'=>'input-nid']) }}
                    </div>
                </div>

{{--                <div class="row form-group">--}}
{{--                    <label for="example-password-input" class="col-2 col-form-label text-right">Transport</label>--}}
{{--                    <div class="col-10">--}}
{{--                        {{ Form::select('location_id',$repository->locations(),null,['class'=>'form-control','id'=>'input-location','placeholder'=>'Select if need transport. Monthly charge will applied.']) }}--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="row form-group">
                    <label for="example-time-input" class="col-2 col-form-label text-right">Marital Status</label>
                    <div class="col-10">
                        {{ Form::text('marital_status',null,['class'=>'form-control','id'=>'input-marital-status']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Mobile</label>
                    <div class="col-10">
                        {{ Form::text('mobile',null,['class'=>'form-control','id'=>'input-mobile']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Email</label>
                    <div class="col-10">
                        {{ Form::text('email',null,['class'=>'form-control','id'=>'input-email']) }}
                    </div>
                </div>
                <div class="row form-group">
                    <label for="example-time-input" class="col-2 col-form-label text-right">Co Curricular Activities</label>
                    <div class="col-10">
                        {{ Form::text('cocurricular',null,['class'=>'form-control','id'=>'input-cocurricular']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Hobby</label>
                    <div class="col-10">
                        {{ Form::text('hobby',null,['class'=>'form-control','id'=>'input-hobby']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Quota</label>
                    <div class="col-10">
                        {{ Form::text('quota',null,['class'=>'form-control','id'=>'input-quota']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Transport (Optional)</label>
                    <div class="col-10">
                        {{ Form::select('location_id',$repository->locations(),null,['class'=>'form-control','id'=>'input-quota','placeholder'=>'Select transport location. Monthly charge will apply.']) }}
                    </div>
                </div>

                <h3 class="text-center">Guardian Information</h3>

                <div class="row form-group">
                    <label for="example-number-input" class="col-2 col-form-label text-right">Father Name</label>
                    <div class="col-10">
                        {{ Form::text('father',null,['class'=>'form-control','id'=>'input-father']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-datetime-local-input" class="col-2 col-form-label text-right">Mother Name</label>
                    <div class="col-10">
                        {{ Form::text('mother',null,['class'=>'form-control','id'=>'input-mother']) }}
                    </div>
                </div>



                <div class="row form-group">
                    <label for="example-month-input" class="col-2 col-form-label text-right">Guardian Name</label>
                    <div class="col-10">
                        {{ Form::text('guardian_name',null,['class'=>'form-control','id'=>'input-guardian']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-date-input" class="col-2 col-form-label text-right">Father Occupation</label>
                    <div class="col-10">
                        {{ Form::text('father_occupation',null,['class'=>'form-control','id'=>'input-father-occupation']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-month-input" class="col-2 col-form-label text-right">Relation With Guardian</label>
                    <div class="col-10">
                        {{ Form::text('relation_with_guardian',null,['class'=>'form-control','id'=>'input-relation-with-guardian']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Guardian Yearly Income</label>
                    <div class="col-10">
                        {{ Form::text('yearly_income',null,['class'=>'form-control','id'=>'input-yearly-income']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Total Family Member</label>
                    <div class="col-10">
                        {{ Form::text('total_member',null,['class'=>'form-control','id'=>'input-total-member']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-time-input" class="col-2 col-form-label text-right">Guardian National ID</label>
                    <div class="col-10">
                        {{ Form::text('guardian_nid',null,['class'=>'form-control','id'=>'input-guardian-nid']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Guardian Mobile</label>
                    <div class="col-10">
                        {{ Form::text('guardian_mobile',null,['class'=>'form-control','id'=>'input-guardian-mobile']) }}
                    </div>
                </div>

                <h3 class="text-center">Present Address</h3>

                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">House Number</label>
                    <div class="col-10">
                        {{ Form::text('pre_house_number',null,['class'=>'form-control','id'=>'input-pre-house-number']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Village/Area</label>
                    <div class="col-10">
                        {{ Form::text('pre_village',null,['class'=>'form-control','id'=>'input-pre-village']) }}
                    </div>
                </div>
                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Road/Block/Area</label>
                    <div class="col-10">
                        {{ Form::text('pre_road',null,['class'=>'form-control','id'=>'input-pre-road']) }}
                    </div>
                </div>
                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Post Office</label>
                    <div class="col-10">
                        {{ Form::text('pre_post_office',null,['class'=>'form-control','id'=>'input-pre-post-office']) }}
                    </div>
                </div>
                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Post Code</label>
                    <div class="col-10">
                        {{ Form::text('pre_post_code',null,['class'=>'form-control','id'=>'input-pre-post-code']) }}
                    </div>
                </div>
                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Upzilla/Thana</label>
                    <div class="col-10">
                        {{ Form::text('pre_thana',null,['class'=>'form-control','id'=>'input-pre-thana']) }}
                    </div>
                </div>
                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">District</label>
                    <div class="col-10">
                        {{ Form::text('pre_district',null,['class'=>'form-control','id'=>'input-pre-district']) }}
                    </div>
                </div>
                <h3 class="text-center">Permanent Address</h3>

                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">House Number</label>
                    <div class="col-10">
                        {{ Form::text('per_house_number',null,['class'=>'form-control','id'=>'input-per-house-number']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Village/Area</label>
                    <div class="col-10">
                        {{ Form::text('per_village',null,['class'=>'form-control','id'=>'input-per-village']) }}
                    </div>
                </div>
                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Road/Block/Area</label>
                    <div class="col-10">
                        {{ Form::text('per_road',null,['class'=>'form-control','id'=>'input-per-road']) }}
                    </div>
                </div>
                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Post Office</label>
                    <div class="col-10">
                        {{ Form::text('per_post_office',null,['class'=>'form-control','id'=>'input-per-post-office']) }}
                    </div>
                </div>
                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Post Code</label>
                    <div class="col-10">
                        {{ Form::text('per_post_code',null,['class'=>'form-control','id'=>'input-per-post-code']) }}
                    </div>
                </div>
                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Upzilla/Thana</label>
                    <div class="col-10">
                        {{ Form::text('per_thana',null,['class'=>'form-control','id'=>'input-per-thana']) }}
                    </div>
                </div>
                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">District</label>
                    <div class="col-10">
                        {{ Form::text('per_district',null,['class'=>'form-control','id'=>'input-per-district']) }}
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- END container -->
</div>
