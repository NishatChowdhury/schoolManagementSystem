<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card-header" style="text-align: center">
            <span style="text-align: center"><i class="fas fa-info-circle" style="text-align: center"></i></span>
            <h3 class="card-title" style="text-align: center">General Details</h3>
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="card-header" style="text-align: center">
            <span style="text-align: center"><i class="fas fa-hand-holding-usd" style="text-align: center"></i></span>
            <h3 class="card-title" style="text-align: center">Payment Details</h3>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
        <div class="col-md-12 col-sm-12" style="margin-top: 20px; ">
            <div class="card-header">
                <h5 class="card-title">Student Details</h5>
            </div>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('session_id', 'Academic Year',['class'=>'control-label' ]) }}
                        {{ Form::select('session_id',$repository->sessions(), null, ['placeholder' => 'Select Academic year...','class'=>'form-control year']) }}
                        @error('session_id')
                        <b style="color: red">{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('class_id','Class',['class'=>'control-label'])}}
                        {{ Form::select('class_id', $repository->classes(), null, ['placeholder' => 'Select Class Name...','class'=>'form-control class']) }}
                        @error('class_id')
                        <b style="color: red">{{ $message }}</b>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('section_id','Section',['class'=>'control-label']) }}
                        {{ Form::select('section_id',$repository->sections(),null,['class'=>'form-control','placeholder'=>'Select Section']) }}
                        @error('section_id')
                        <b style="color: red">{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('group_id','Group',['class'=>'control-label']) }}
                        {{ Form::select('group_id', $repository->groups(), null, ['placeholder' => 'Select Section...','class'=>'form-control']) }}
                        @error('group_id')
                        <b style="color: red">{{ $message }}</b>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="form-group">
                        {{Form::label('name','Student\'s name',['class'=>'control-label'])}}
                        {{ Form::text('name', null, ['placeholder' => 'Student\'s  Name...','class'=>'form-control ' ]) }}
                        @error('name')
                            <b style="color: red">{{ $message }}</b>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{Form::label('studentId','Student ID',['class'=>'control-label'])}}
                        {{ Form::text('studentId',null, ['placeholder' => 'Student ID...','class'=>'form-control','readonly','id'=>'studentID']) }}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('rank','Rank',['class'=>'control-label']) }}
                        {{ Form::text('rank',null,['class'=>'form-control', 'placeholder'=>'Student Rank','id'=>'rank']) }}
                      
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('dob','Date of Birth',['class'=>'control-label']) }}
                        {{ Form::date('dob',null,['class'=>'form-control', 'placeholder'=>'Date of Birth']) }}
                        @error('dob')
                        <b style="color: red">{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('gender','Gender',['class'=>'control-label']) }}
                        {{ Form::select('gender_id', $repository->genders(), null, ['placeholder' => 'Select Gender...','class'=>'form-control']) }}
                        @error('gender_id')
                        <b style="color: red">{{ $message }}</b>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div  class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('fatherName','Father Name',['class'=>'control-label']) }}
                        {{ Form::text('father',null,['class'=>'form-control', 'placeholder'=>'Father Name']) }}
                        @error('father')
                        <b style="color: red">{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('motherName','Mother Name',['class'=>'control-label']) }}
                        {{ Form::text('mother',null,['class'=>'form-control', 'placeholder'=>'Mother Name']) }}
                        @error('mother')
                        <b style="color: red">{{ $message }}</b>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('bloodGroup','Blood Group',['class'=>'control-label']) }}
                        {{ Form::select('blood_group_id', $repository->bloods(), null, ['placeholder' => 'Select Blood Group...','class'=>'form-control']) }}
                        @error('blood_group_id')
                        <b style="color: red">{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('religion_id','Religion',['class'=>'control-label']) }}
                        {{ Form::select('religion_id', $repository->religions(), null, ['placeholder' => 'Select Blood Group...','class'=>'form-control']) }}
                        @error('religion_id')
                        <b style="color: red">{{ $message }}</b>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div  class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('fatherName','SSC Roll',['class'=>'control-label']) }}
                        {{ Form::text('ssc_roll',null,['class'=>'form-control', 'placeholder'=>'SSC Roll (Optional)']) }}
                        @error('ssc_roll')
                        <b style="color: red">{{ $message }}</b>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('motherName','SSC Registration',['class'=>'control-label']) }}
                        {{ Form::text('ssc_registration',null,['class'=>'form-control', 'placeholder'=>'SSC Registration (optional)']) }}
                        @error('ssc_registration')
                        <b style="color: red">{{ $message }}</b>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div  class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('fatherName','SSC Session',['class'=>'control-label']) }}
                        {{ Form::text('ssc_session',null,['class'=>'form-control', 'placeholder'=>'SSC Session (optional)']) }}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('motherName','SSC Year',['class'=>'control-label']) }}
                        {{ Form::text('ssc_year',null,['class'=>'form-control', 'placeholder'=>'SSC Year (optional)']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div  class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('fatherName','SSC Board',['class'=>'control-label']) }}
                        {{ Form::text('ssc_board',null,['class'=>'form-control', 'placeholder'=>'SSC Board (optional)']) }}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">

                    </div>
                </div>
            </div>
            <div class="form-group files color">
                {{ Form::label('stuPic', 'Student Picture', ['class' => 'control-label']) }}
                {{ Form::file('pic',['class'=>'form-control', 'id'=>"file-input"]) }}
                @error('pic')
                        <b style="color: red">{{ $message }}</b>
                @enderror
                <div id="thumb-output"></div>
            </div>
        </div>

        </div>
        <!-- /.card-body -->
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="col-md-12 col-sm-12" style="margin-top: 20px; ">
                <div class="card-header">
                    <h5 class="card-title">Street Address</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    {{ Form::label('streetAddress','Address',['class'=>'control-label']) }}
                    {{ Form::textarea('address',null,['class'=>'form-control', 'rows'=>1, 'placeholder'=>'Address']) }}
                    @error('address')
                        <b style="color: red">{{ $message }}</b>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('area','Area / Town',['class'=>'control-label']) }}
                    {{ Form::text('area',null,['class'=>'form-control', 'placeholder'=>'Area Town']) }}
                    @error('area')
                        <b style="color: red">{{ $message }}</b>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('postCode','Post / Zip Code',['class'=>'control-label']) }}
                            {{ Form::text('zip',null,['class'=>'form-control', 'placeholder'=>'Post / Zip Code']) }}
                            @error('zip')
                        <b style="color: red">{{ $message }}</b>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('division','Division',['class'=>'control-label']) }}
                            {{ Form::select('division_id', $repository->divisions(), null, ['placeholder' => 'Select Division...','class'=>'form-control']) }}
                            @error('division_id')
                        <b style="color: red">{{ $message }}</b>
                        @enderror
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('city_id','City',['class'=>'control-label']) }}
                            {{ Form::select('city_id',$repository->cities(), null, ['placeholder' => 'Select City','class'=>'form-control']) }}
                            @error('city_id')
                        <b style="color: red">{{ $message }}</b>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                            {{ Form::label('country','Country',['class'=>'control-label']) }}
                            {{ Form::select('country_id', $repository->countries(), null, ['placeholder' => 'Select Country...','class'=>'form-control']) }}
                            @error('country_id')
                        <b style="color: red">{{ $message }}</b>
                        @enderror
                        </div>
                    </div>

                </div>
            </div>

            <div class="">
                <div class="card">
                    <div class="col-md-12 col-sm-12" style="margin-top: 20px; ">
                        <div class="card-header">
                            <h5 class="card-title">Contact Details</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    {{ Form::label('contactMobile','Contact Mobile',['class'=>'control-label']) }}
                                    {{ Form::text('mobile',null,['class'=>'form-control', 'placeholder'=>'Contact Mobile']) }}
                                    @error('mobile')
                                    <b style="color: red">{{ $message }}</b>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    {{ Form::label('email','E-mail',['class'=>'control-label']) }}
                                    {{ Form::email('email',null,['class'=>'form-control', 'placeholder'=>'email@gmail.com']) }}
                                    @error('email')
                                    <b style="color: red">{{ $message }}</b>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    {{ Form::label('father_mobile','Father Mobile',['class'=>'control-label']) }}
                                    {{ Form::text('father_mobile',null,['class'=>'form-control', 'placeholder'=>'Father Mobile']) }}
                                    @error('father_mobile')
                                    <b style="color: red">{{ $message }}</b>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="form-group">
                                    {{ Form::label('mother_mobile','Mother Mobile',['class'=>'control-label']) }}
                                    {{ Form::text('mother_mobile',null,['class'=>'form-control', 'placeholder'=>'Mother Mobile']) }}
                                    @error('mother_mobile')
                                    <b style="color: red">{{ $message }}</b>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('status','Status',['class'=>'control-label']) }}
                            {{ Form::radio('status', 0, false, ['id'=>'inactive']) }}&nbsp;{{ Form::label('inactive','Inactive') }}
                            {{ Form::radio('status', 1, true, ['id'=>'active']) }}&nbsp;{{ Form::label('active','Active') }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'form-control, btn btn-success btn-block']) !!}
            </div>
        </div>
</div>
</div>
{{--@section('script')--}}
{{--<script>--}}
    {{--$(document).on('keyup','#rank', function () {--}}
    {{--    var academicYear = $('.year').val();--}}
    {{--    $.ajax({--}}
    {{--        url:"{{url('/load_student_id')}}",--}}
    {{--        type:'GET',--}}
    {{--        data:{academicYear:academicYear},--}}
    {{--        success:function (data) {--}}
    {{--            console.log(data);--}}
    {{--            $('#studentID').val(data);--}}

    {{--        }--}}
    {{--    });--}}
    {{--});--}}
{{--</script>--}}
{{--@stop--}}
