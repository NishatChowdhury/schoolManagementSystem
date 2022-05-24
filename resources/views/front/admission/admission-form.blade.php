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
            <p>Download <code><a href="#">Admission Form</a></code> Download <code><a href="#">Invoice</a></code><!-- Download <code><a href="#">Bank Slip</a></code>--></p>
        </div>

        <div class="container">
            <ul class="nav tab-line tab-line tab-line--2x border-bottom justify-content-center mb-4" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#student-information" role="tab" aria-selected="true">Student Information</a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" data-toggle="tab" href="#guardian-information" role="tab" aria-selected="true">--}}
{{--                        Guardian Information--}}
{{--                    </a>--}}
{{--                </li>--}}
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
        {{ Form::open(['action'=>'AppliedStudentController@store','files'=>true]) }}

            @include('front.admission.form')

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

                        var academicYear = $('#session_id').val();
                        var groups = $("#groups").val();
                        var token = "{{ csrf_token() }}";
                        $.ajax({
                            url:"{{url('/load_applied_student_id')}}",
                            type:'post',
                            data:{academicYear:academicYear,groups:groups,_token:token},
                            success:function (data) {
                                console.log(data);
                                $('#studentID').val(data);
                            }
                        });

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
