@extends('layouts.front-inner')

@section('title','Online Admission Form')

@section('content')

    {{--    @php $student = \Illuminate\Support\Facades\Session::get('data') @endphp--}}

    <div class="py-5 bg-dark no-print">
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

    <section class="padding-y-20 border-bottom" style="page-break-after: always;color:black">
        <div class="row">
            <div class="col-9 text-center">
                <img src="{{ asset('assets/img/logos/'.siteConfig('logo')) }}" height="100" alt="{{ siteConfig('name') }}" class="">
                <h2>{{ siteConfig('name') }}</h2>
                <address>
                    {{ siteConfig('address') }}<br>
                    Phone: {{ siteConfig('phone') }} Email: {{ siteConfig('email') }}<br>
                    Website: {{ url('/') }}
                </address>
                <h3>HSC Admission Form (Session 2020-2021)</h3>
            </div>
            <div class="col-2">
                    <table class="table-bordered" style="font-size: 14px;position: absolute;bottom: 50px;margin-left:25px">
                        <tr>
                            <td colspan="2">Only for office use</td>
                        </tr>
                        <tr>
                            <td>Class Roll</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Group</td>
                            <td>{{ \App\Group::query()->findOrNew($student['group_id'])->name }}</td>
                        </tr>
                        <tr>
                            <td>Session</td>
                            <td>{{ \App\Session::query()->findOrNew($student['session_id'])->year }}</td>
                        </tr>
                        <tr>
                            <td>SSC GPA</td>
                            <td>{{ $student['ssc_gpa'] }}</td>
                        </tr>
                        <tr>
                            <td>SSC Roll</td>
                            <td>{{ $student['ssc_roll'] }}</td>
                        </tr>
                    </table>
            </div>
        </div>
        <div class="container" style="text-transform: uppercase">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <table class="table table-bordered table-personal">
                            <tr>
                                <td>Student's ID</td>
                                <td>{{ $student['studentId'] }}</td>
                            </tr>
                            <tr>
                                <td>Date Of Admission</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $student['name'] }}</td>
                            </tr>
                            <tr>
                                <td>Father's Name</td>
                                <td>{{ $student['father'] }}</td>
                            </tr>
                            <tr>
                                <td>Mother's Name</td>
                                <td>{{ $student['mother'] }}</td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td>{{ $student['dob'] }}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>{{ \App\Gender::query()->findOrNew($student['gender_id'])->name }}</td>
                            </tr>
                            <tr>
                                <td>Blood Group</td>
                                <td>{{ \App\BloodGroup::query()->findOrNew($student['blood_group_id'])->name }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <img src="{{ asset('assets/img/students') }}/{{ $student->image }}" class="img-thumbnail" width="180" height="220" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered table-guardian">
                        <tr>
                            <td colspan="2">Birth Registration Certificate Number</td>
                            <td colspan="2">{{ $student['brcn'] }}</td>
                        </tr>
                        <tr>
                            <td>NID No.</td>
                            <td>{{ $student['nid'] }}</td>
                            <td>Religion</td>
                            <td>{{ \App\Religion::query()->findOrNew($student['religion_id'])->name }}</td>
                        </tr>
                        <tr>
                            <td>Nationality</td>
                            <td>Bangladeshi</td>
                            <td>Version</td>
                            <td>Bangla</td>
                        </tr>
                        <tr>
                            <td>Guardian's Name</td>
                            <td>{{ $student['guardian_name'] }}</td>
                            <td>Guardian's Profession</td>
                            <td>{{ $student['father_occupation'] }}</td>
                        </tr>
                        <tr>
                            <td>Relation with Guardian</td>
                            <td>{{ $student['relation_with_guardian'] }}</td>
                            <td>Guardian's Annual Income</td>
                            <td>{{ $student['yearly_income'] }}</td>
                        </tr>
                        <tr>
                            <td>Total Family Members</td>
                            <td>{{ $student['total_member'] }}</td>
                            <td>Guardian's NID no.</td>
                            <td>{{ $student['guardian_nid'] }}</td>
                        </tr>
                        <tr>
                            <td>Marital Status</td>
                            <td>{{ $student['marital_status'] }}</td>
                            <td>Preferred Group</td>
                            <td>{{ $student['preferred_group'] }}</td>
                        </tr>
                        <tr>
                            <td>Class</td>
                            <td>{{ \App\Classes::query()->findOrNew($student['class_id'])->name }}</td>
                            <td>Session</td>
                            <td>{{ \App\Session::query()->findOrNew($student['session_id'])->year }}</td>
                        </tr>
                        <tr>
                            <td>Student's Mobile</td>
                            <td>{{ $student['mobile'] }}</td>
                            <td>Guardian's Mobile</td>
                            <td>{{ $student['guardian_mobile'] }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                        <h5>SSC Information</h5>
                </div>
            </div>
            <div class="row" style="page-break-after: always">
                <table class="table table-bordered table-ssc">
                    <tr>
                        <td>Board</td>
                        <td>{{ $student['ssc_board'] }}</td>
                        <td>Passing Year</td>
                        <td>{{ $student['ssc_year'] }}</td>
                    </tr>
                    <tr>
                        <td>SSC Roll No:</td>
                        <td>{{ $student['ssc_roll'] }}</td>
                        <td>GPA</td>
                        <td>{{ $student['ssc_gpa'] }}</td>
                    </tr>
                    <tr>
                        <td>SSC Registration No:</td>
                        <td>{{ $student['ssc_registration'] }}</td>
                        <td>SSC Group</td>
                        <td>{{ $student['ssc_group'] }}</td>
                    </tr>
                    <tr>
                        <td>SSC Session</td>
                        <td>{{ $student['ssc_session'] }}</td>
                        <td>SSC School Name</td>
                        <td>{{ $student['ssc_school'] }}</td>
                    </tr>
                    <tr>
                        <td>Student Type</td>
                        <td>{{ $student['student_type'] }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <p class="text-right w-100" style="margin-bottom: .5rem">P.T.O</p>
            </div>

            <div class="row">
                <div class="col-md-12 text-center mt-4">
                    <h5>Page - 2</h5>
                </div>
            </div>
            <div class="row">
                <table class="table table-bordered table-address">
                    <tr>
                        <td colspan="2">Student's Present Address</td>
                        <td colspan="2">Student's Permanent Address</td>
                    </tr>
                    <tr>
                        <td>House Number</td>
                        <td>{{ $student['pre_house_number'] }}</td>
                        <td>House Number</td>
                        <td>{{ $student['per_house_number'] }}</td>
                    </tr>
                    <tr>
                        <td>Village/Area</td>
                        <td>{{ $student['pre_village'] }}</td>
                        <td>Village/Area</td>
                        <td>{{ $student['per_village'] }}</td>
                    </tr>
                    <tr>
                        <td>Road/Block/Ward</td>
                        <td>{{ $student['pre_road'] }}</td>
                        <td>Road/Block/Ward</td>
                        <td>{{ $student['per_road'] }}</td>
                    </tr>
                    <tr>
                        <td>Post Office</td>
                        <td>{{ $student['pre_post_office'] }}</td>
                        <td>Post Office</td>
                        <td>{{ $student['per_post_office'] }}</td>
                    </tr>
                    <tr>
                        <td>Post Code</td>
                        <td>{{ $student['pre_post_code'] }}</td>
                        <td>Post Code</td>
                        <td>{{ $student['per_post_code'] }}</td>
                    </tr>
                    <tr>
                        <td>Upzilla/Thana</td>
                        <td>{{ $student['pre_thana'] }}</td>
                        <td>Upzilla/Thana</td>
                        <td>{{ $student['per_thana'] }}</td>
                    </tr>
                    <tr>
                        <td>District</td>
                        <td>{{ $student['pre_district'] }}</td>
                        <td>District</td>
                        <td>{{ $student['per_district'] }}</td>
                    </tr>
                    <tr>
                        <td>Co-curricular Activities</td>
                        <td>{{ $student['cocurricular'] }}</td>
                        <td>Hobby</td>
                        <td>{{ $student['hobby'] }}</td>
                    </tr>
                    <tr>
                        <td>Quota</td>
                        <td>{{ $student['quota'] }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <h3 class="col-md-12 text-center">Registered Subject for HSC</h3>
                        <table class="table table-bordered table-subject">
                            @foreach($subjects as $key => $subject)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>
                                        <ol style="margin-bottom: 0">
                                            @foreach($subject as $sub)
                                            <li>
                                                {{ \App\OnlineSubject::query()->findOrNew($sub)->name }}
                                                ({{ \App\OnlineSubject::query()->findOrNew($sub)->code }})
                                            </li>
                                            @endforeach
                                        </ol>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-justify">
                    <p><b>I, {{ $student->name }}, do hereby declare that the above mentioned information and photo are correct. if any information provided by me is found false, {{ siteConfig('name') }} reserve the right to cancel my admission. i shall be obliged to obey the rules and regulations of {{ siteConfig('name') }} and to pay all the required fees.</b></p>
                </div>
            </div>
            <div class="row marginTop-100" style="font-weight: bold">
                <div class="col-md-6 text-center">
                    <span style="border-top:1px solid #333">Student's Signature & Date</span>
                </div>
                <div class="col-md-6 text-center">
                    <span style="border-top:1px solid #333">Guardian's Signature & Date</span>
                </div>
            </div>
            <div class="row marginTop-65 mb-5" style="font-weight: bold">
                <div class="col-md-6 text-center">
                    <span style="border-top:1px solid #333">Admission Committee Signature</span>
                </div>
                <div class="col-md-6 text-center">
                    <span style="border-top:1px solid #333">Principal<br></span>
                    <span>{{ siteConfig('name') }}<br></span>
                    <span>{{ siteConfig('address') }}</span>
                </div>
            </div>

            <div class="row">
                <h3 class="col-md-12 text-center">Official Use</h3>
                <table class="table table-bordered">
                    <tr>
                        <td>Receipt No.</td>
                        <td>Amount</td>
                        <td>Accountant Signature</td>
                        <td>Comment</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </section>

@stop

@section('style')
    <style>
        .table-ssc td{
            /*padding: .50rem;*/
        }
        .table-personal td{
            /*padding: .50rem;*/
        }
        .table-guardian td{
            /*padding: .50rem;*/
        }
        .table-subject td{
            /*padding: .50rem;*/
        }
        .table-address td{
            /*padding: .50rem;*/
        }
        .table td{
            font-weight: bold;
        }
        @page{
            margin: 15mm 5mm;
        }
    </style>
@stop

@section('script')

@stop
