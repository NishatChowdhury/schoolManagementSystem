@extends('layouts.front-inner')

@section('title','Online Admission Form')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>Admission Form</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Result</a>
                        </li>
                        <li class="breadcrumb-item">
                            {{ ucfirst('Admission Form') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-20 border-bottom">

        <div class="col-12 text-center">
            <h4>Online Admission Form</h4>
            <p>Download <code><a href="{{ action('FrontController@studentForm',['ssc_roll'=>$student->ssc_roll]) }}">Admission Form</a></code> Download <code><a href="{{ action('FrontController@invoice',['ssc_roll'=>$student->ssc_roll]) }}">Invoice</a></code><!-- Download <code><a href="{{ action('FrontController@bankSlip',['ssc_roll'=>$student->ssc_roll]) }}">Bank Slip</a></code> --></p>
        </div>

        <div class="container">
            <ul class="nav tab-line tab-line tab-line--2x border-bottom justify-content-center mb-4" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#student-information" role="tab" aria-selected="true">Student Information</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#ssc-information" role="tab" aria-selected="true">
                        SSC Information
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#subjects" role="tab" aria-selected="true">
                        Choose Subjects
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#photograph" role="tab" aria-selected="true">
                        Student Photo
                    </a>
                </li>
                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link" data-toggle="tab" href="#bank-slip" role="tab" aria-selected="true">--}}
                {{--                        Upload Bank Slip--}}
                {{--                    </a>--}}
                {{--                </li>--}}

            </ul>
        </div> <!-- END container-->

        {{ Form::model($student,['action'=>'AppliedStudentController@store','files'=>true]) }}
        <div class="tab-content">

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
                                    {{ Form::select('gender_id',$repository->genders(),null,['class'=>'form-control','id'=>'input-gender','disabled']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-email-input" class="col-2 col-form-label text-right">Date of Birth</label>
                                <div class="col-10">
                                    {{ Form::date('dob',null,['class'=>'form-control','id'=>'example-date-input','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-url-input" class="col-2 col-form-label text-right">Birth Registration Certificate Number</label>
                                <div class="col-10">
                                    {{ Form::text('brcn',null,['class'=>'form-control','id'=>'input-bcn','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-tel-input" class="col-2 col-form-label text-right">Blood Group</label>
                                <div class="col-10">
                                    {{ Form::select('blood_group_id',$repository->bloods(),null,['class'=>'form-control','id'=>'input-blood','disabled']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-password-input" class="col-2 col-form-label text-right">Religion</label>
                                <div class="col-10">
                                    {{ Form::select('religion_id',$repository->religions(),null,['class'=>'form-control','id'=>'input-religion','disabled']) }}
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
                                    {{ Form::text('nid',null,['class'=>'form-control','id'=>'input-nid','readonly']) }}
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
                                    {{ Form::text('marital_status',null,['class'=>'form-control','id'=>'input-marital-status','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">Mobile</label>
                                <div class="col-10">
                                    {{ Form::text('mobile',null,['class'=>'form-control','id'=>'input-mobile','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">Email</label>
                                <div class="col-10">
                                    {{ Form::text('email',null,['class'=>'form-control','id'=>'input-email','readonly']) }}
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="example-time-input" class="col-2 col-form-label text-right">Co Curricular Activities</label>
                                <div class="col-10">
                                    {{ Form::text('cocurricular',null,['class'=>'form-control','id'=>'input-cocurricular','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">Hobby</label>
                                <div class="col-10">
                                    {{ Form::text('hobby',null,['class'=>'form-control','id'=>'input-hobby','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">Quota</label>
                                <div class="col-10">
                                    {{ Form::text('quota',null,['class'=>'form-control','id'=>'input-quota','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">Transport (Optional)</label>
                                <div class="col-10">
                                    {{ Form::select('location_id',$repository->locations(),null,['class'=>'form-control','id'=>'input-quota','placeholder'=>'Select transport location. Monthly charge will apply.','disabled']) }}
                                </div>
                            </div>

                            <h3 class="text-center">Guardian Information</h3>

                            <div class="row form-group">
                                <label for="example-number-input" class="col-2 col-form-label text-right">Father Name</label>
                                <div class="col-10">
                                    {{ Form::text('father',null,['class'=>'form-control','id'=>'input-father','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-datetime-local-input" class="col-2 col-form-label text-right">Mother Name</label>
                                <div class="col-10">
                                    {{ Form::text('mother',null,['class'=>'form-control','id'=>'input-mother','readonly']) }}
                                </div>
                            </div>



                            <div class="row form-group">
                                <label for="example-month-input" class="col-2 col-form-label text-right">Guardian Name</label>
                                <div class="col-10">
                                    {{ Form::text('guardian_name',null,['class'=>'form-control','id'=>'input-guardian','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-date-input" class="col-2 col-form-label text-right">Father Occupation</label>
                                <div class="col-10">
                                    {{ Form::text('father_occupation',null,['class'=>'form-control','id'=>'input-father-occupation','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-month-input" class="col-2 col-form-label text-right">Relation With Guardian</label>
                                <div class="col-10">
                                    {{ Form::text('relation_with_guardian',null,['class'=>'form-control','id'=>'input-relation-with-guardian','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">Guardian Yearly Income</label>
                                <div class="col-10">
                                    {{ Form::text('yearly_income',null,['class'=>'form-control','id'=>'input-yearly-income','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">Total Family Member</label>
                                <div class="col-10">
                                    {{ Form::text('total_member',null,['class'=>'form-control','id'=>'input-total-member','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-time-input" class="col-2 col-form-label text-right">Guardian National ID</label>
                                <div class="col-10">
                                    {{ Form::text('guardian_nid',null,['class'=>'form-control','id'=>'input-guardian-nid','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">Guardian Mobile</label>
                                <div class="col-10">
                                    {{ Form::text('guardian_mobile',null,['class'=>'form-control','id'=>'input-guardian-mobile','readonly']) }}
                                </div>
                            </div>

                            <h3 class="text-center">Present Address</h3>

                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">House Number</label>
                                <div class="col-10">
                                    {{ Form::text('pre_house_number',null,['class'=>'form-control','id'=>'input-pre-house-number','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">Village/Area</label>
                                <div class="col-10">
                                    {{ Form::text('pre_village',null,['class'=>'form-control','id'=>'input-pre-village','readonly']) }}
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">Road/Block/Area</label>
                                <div class="col-10">
                                    {{ Form::text('pre_road',null,['class'=>'form-control','id'=>'input-pre-road','readonly']) }}
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">Post Office</label>
                                <div class="col-10">
                                    {{ Form::text('pre_post_office',null,['class'=>'form-control','id'=>'input-pre-post-office','readonly']) }}
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">Post Code</label>
                                <div class="col-10">
                                    {{ Form::text('pre_post_code',null,['class'=>'form-control','id'=>'input-pre-post-code','readonly']) }}
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">Upzilla/Thana</label>
                                <div class="col-10">
                                    {{ Form::text('pre_thana',null,['class'=>'form-control','id'=>'input-pre-thana','readonly']) }}
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">District</label>
                                <div class="col-10">
                                    {{ Form::text('pre_district',null,['class'=>'form-control','id'=>'input-pre-district','readonly']) }}
                                </div>
                            </div>
                            <h3 class="text-center">Permanent Address</h3>

                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">House Number</label>
                                <div class="col-10">
                                    {{ Form::text('per_house_number',null,['class'=>'form-control','id'=>'input-per-house-number','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">Village/Area</label>
                                <div class="col-10">
                                    {{ Form::text('per_village',null,['class'=>'form-control','id'=>'input-per-village','readonly']) }}
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">Road/Block/Area</label>
                                <div class="col-10">
                                    {{ Form::text('per_road',null,['class'=>'form-control','id'=>'input-per-road','readonly']) }}
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">Post Office</label>
                                <div class="col-10">
                                    {{ Form::text('per_post_office',null,['class'=>'form-control','id'=>'input-per-post-office','readonly']) }}
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">Post Code</label>
                                <div class="col-10">
                                    {{ Form::text('per_post_code',null,['class'=>'form-control','id'=>'input-per-post-code','readonly']) }}
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">Upzilla/Thana</label>
                                <div class="col-10">
                                    {{ Form::text('per_thana',null,['class'=>'form-control','id'=>'input-per-thana','readonly']) }}
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">District</label>
                                <div class="col-10">
                                    {{ Form::text('per_district',null,['class'=>'form-control','id'=>'input-per-district','readonly']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- END container -->
            </div>
            <div class="tab-pane fade" id="ssc-information" role="tabpanel">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mx-auto">
                            <div class="row form-group">
                                <label for="example-number-input" class="col-2 col-form-label text-right">Board</label>
                                <div class="col-10">
                                    {{ Form::text('ssc_board',null,['class'=>'form-control','id'=>'input-ssc-board','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-datetime-local-input" class="col-2 col-form-label text-right">Passing Year</label>
                                <div class="col-10">
                                    {{ Form::text('ssc_year',null,['class'=>'form-control','id'=>'input-ssc-year','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-date-input" class="col-2 col-form-label text-right">SSC Roll</label>
                                <div class="col-10">
                                    {{ Form::text('ssc_roll',null,['class'=>'form-control','id'=>'input-ssc-roll','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-month-input" class="col-2 col-form-label text-right">SSC Registration</label>
                                <div class="col-10">
                                    {{ Form::text('ssc_registration',null,['class'=>'form-control','id'=>'input-ssc-registration','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-week-input" class="col-2 col-form-label text-right">SSC Session</label>
                                <div class="col-10">
                                    {{ Form::text('ssc_session',null,['class'=>'form-control','id'=>'input-ssc-session','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-time-input" class="col-2 col-form-label text-right">Student Type</label>
                                <div class="col-10">
                                    {{ Form::text('student_type',null,['class'=>'form-control','id'=>'input-student-type','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">GPA</label>
                                <div class="col-10">
                                    {{ Form::text('ssc_gpa',null,['class'=>'form-control','id'=>'input-gpa','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">SSC Group</label>
                                <div class="col-10">
                                    {{ Form::text('ssc_group',null,['class'=>'form-control','id'=>'input-ssc-group','readonly']) }}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="example-textarea" class="col-2 col-form-label text-right">SSC School</label>
                                <div class="col-10">
                                    {{ Form::text('ssc_school',null,['class'=>'form-control','id'=>'input-ssc-school','readonly']) }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="subjects" role="tabpanel">
                <div class="container">
                    <div class="row">

                        <div class="col-12 mx-auto">
                            <div class="row">
                                <div class="col-md-4">
                                    <h3 class="text-center">Compulsory</h3>
                                    <div class="row form-group">
                                        {{ Form::select('fc',[1=>'Bangla'],null,['class'=>'form-control','id'=>'input-fc','required','disabled']) }}
                                    </div>
                                    <div class="row form-group">
                                        {{ Form::select('sc',[2=>'English'],null,['class'=>'form-control','id'=>'input-sc','required','disabled']) }}
                                    </div>
                                    <div class="row form-group">
                                        {{ Form::select('tc',[3=>'ICT'],null,['class'=>'form-control','id'=>'input-tc','required','disabled']) }}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <h3 class="text-center">Selective/Elective</h3>
                                    @php $subjects = isset($student) ? json_decode($student->subjects,true) : null @endphp
                                    <div class="row form-group">
                                        {{ Form::select('fs',$selective,$subjects ? $subjects['selective'][0] : null,['class'=>'form-control','id'=>'input-fs','placeholder'=>'select 1st selective subject','required','disabled']) }}
                                    </div>
                                    <div class="row form-group">
                                        {{ Form::select('ss',$selective,$subjects ? $subjects['selective'][1] : null,['class'=>'form-control','id'=>'input-ss','placeholder'=>'select 2nd selective subject','required','disabled']) }}
                                    </div>
                                    <div class="row form-group">
                                        {{ Form::select('ts',$selective,$subjects ? $subjects['selective'][2] : null,['class'=>'form-control','id'=>'input-ts','placeholder'=>'select 3rd selective subject','required','disabled']) }}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <h3 class="text-center">Optional</h3>
                                    <div class="row form-group">
                                        {{ Form::select('optional',$optional,$subjects ? $subjects['optional'][0] : null,['class'=>'form-control','id'=>'input-optional','placeholder'=>'select optional subject','required','disabled']) }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="photograph" role="tabpanel">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mx-auto">
                            <div class="row form-group">
                                <label for="example-number-input" class="col-2 col-form-label text-right">Image</label>
                                <div class="col-10">
                                    <img src="{{ asset('assets/img/students/') }}/{{ $student->image }}" alt="" height="200" class="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{ Form::close() }}

    </section>
@stop

@section('script')
    <script>
        $("#submit-button").click(function(){
            $("#name").text($("#input-name").val())
            $("#gender").text($("#input-gender option:selected").text())
            $("#dob").text($("#example-date-input").val())
            $("#bcn").text($("#input-bcn").val())
            $("#blood").text($("#input-blood option:selected").text())
            $("#religion").text($("#input-religion option:selected").text())
            $("#address").text($("#input-address").val())

            $("#father").text($("#input-father").val())
            $("#mother").text($("#input-mother").val())
            $("#father-occupation").text($("#input-father-occupation").val())
            $("#mother-occupation").text($("#input-mother-occupation").val())
            $("#other-guardian").text($("#input-other-guardian").val())
            $("#guardian-national-id").text($("#input-guardian-national-id").val())
            $("#mobile").text($("#input-mobile").val())
            $("#email").text($("#input-email").val())
            $("#yearly-income").text($("#input-yearly-income").val())
            $("#guardian-address").text($("#input-guardian-address").val())
        })
    </script>

    <script>
        $(document).ready(function () {
            var academicYear = $('.year').val();
            var ssc_roll = "{{ $_GET['ssc_roll'] }}"
            $.ajax({
                url:"{{url('/load_online_student_info')}}",
                type:'GET',
                data:{academicYear:academicYear,ssc_roll:ssc_roll},
                success:function (data) {
                    console.log(data);
                    // $('#studentID').val(data.studentId);
                    $('#ssc-roll').val(data.ssc_roll);
                    $('#input-name').val(data.name);
                    $('#session_id').val(data.session_id);
                    $('#class_id').val(data.class_id);
                    $('#group_id').val(data.group_id);
                    $('#session').val(data.session);
                    $('#classes').val(data.classes);
                    $('#groups').val(data.groups);
                    $('#input-ssc-board').val(data.ssc_board);
                    $('#input-ssc-year').val(data.ssc_year);
                    $('#input-ssc-roll').val(data.ssc_roll);
                }
            });
        });
    </script>
    @if(URL::current() == "http://karnafulicollege.edu.bd/admission-form")
        <script>
            $("#input-fs").change(function(){
                var fs = $(this).val();
                $("#input-ss option[value='"+fs+"']").remove();
                $("#input-ts option[value='"+fs+"']").remove();
                $("#input-optional option[value='"+fs+"']").remove();
                if(fs == 17){
                    $("#input-ss option[value='18']").remove();
                    $("#input-ts option[value='18']").remove();
                    $("#input-optional option[value='18']").remove();
                }else if(fs == 18){
                    $("#input-ss option[value='17']").remove();
                    $("#input-ts option[value='17']").remove();
                    $("#input-optional option[value='17']").remove();
                }
            })
            $("#input-ss").change(function(){
                var ss = $(this).val();
                $("#input-fs option[value='"+ss+"']").remove();
                $("#input-ts option[value='"+ss+"']").remove();
                $("#input-optional option[value='"+ss+"']").remove();
                if(ss == 17){
                    $("#input-fs option[value='18']").remove();
                    $("#input-ts option[value='18']").remove();
                    $("#input-optional option[value='18']").remove();
                }else if(ss == 18){
                    $("#input-fs option[value='17']").remove();
                    $("#input-ts option[value='17']").remove();
                    $("#input-optional option[value='17']").remove();
                }
            })
            $("#input-ts").change(function(){
                var ts = $(this).val();
                $("#input-fs option[value='"+ts+"']").remove();
                $("#input-ss option[value='"+ts+"']").remove();
                $("#input-optional option[value='"+ts+"']").remove();
                if(ts == 17){
                    $("#input-fs option[value='18']").remove();
                    $("#input-ss option[value='18']").remove();
                    $("#input-optional option[value='18']").remove();
                }else if(ts == 18){
                    $("#input-fs option[value='17']").remove();
                    $("#input-ss option[value='17']").remove();
                    $("#input-optional option[value='17']").remove();
                }
            })
            $("#input-optional").change(function(){
                var optional = $(this).val();
                $("#input-fs option[value='"+optional+"']").remove();
                $("#input-ss option[value='"+optional+"']").remove();
                $("#input-ts option[value='"+optional+"']").remove();
                if(optional == 17){
                    $("#input-fs option[value='18']").remove();
                    $("#input-ss option[value='18']").remove();
                    $("#input-ts option[value='18']").remove();
                }else if(optional == 18){
                    $("#input-fs option[value='17']").remove();
                    $("#input-ss option[value='17']").remove();
                    $("#input-ts option[value='17']").remove();
                }
            })
        </script>
    @endif
@stop
