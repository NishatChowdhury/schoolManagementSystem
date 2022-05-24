@extends('layouts.fixed')

@section('title', 'Exam Mgmt | Admit Card')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Admit Card</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Exam Mgmt</a></li>
                        <li class="breadcrumb-item active">Admit Card</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- /.Search-panel -->
    <section class="content no-print">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- form start -->
                        {{--<form method="GET" action="http://localhost/wpschool/public/students" accept-charset="UTF-8" role="form">--}}
                        {{ Form::open(['action'=>'ExamController@admitCard','method'=>'get','role'=>'form']) }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Examination</label>
                                    <div class="input-group">
                                        {{--<select class="form-control" name="class_id"><option selected="selected" value="">Select Class</option></select>--}}
                                        {{ Form::select('exam_id',$repository->exams(),null,['class'=>'form-control','placeholder'=>'Select Exam','required']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Student ID</label>
                                    <div class="input-group">
                                        {{--<input class="form-control" placeholder="Student ID" name="studentId" type="text">--}}
                                        {{ Form::text('studentId',null,['class'=>'form-control','placeholder'=>'Student ID']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Class</label>
                                    <div class="input-group">
                                        {{--<select class="form-control" name="class_id"><option selected="selected" value="">Select Class</option></select>--}}
                                        {{ Form::select('class_id',$repository->classes(),null,['class'=>'form-control','placeholder'=>'Select Class']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Section</label>
                                    <div class="input-group">
                                        {{--<select class="form-control" name="section_id"><option selected="selected" value="">Select Section</option></select>--}}
                                        {{ Form::select('section_id',$repository->sections(),null,['class'=>'form-control','placeholder'=>'Select Section']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Group</label>
                                    <div class="input-group">
                                        {{--<select class="form-control" name="group_id"><option selected="selected" value="">Select Group</option></select>--}}
                                        {{ Form::select('group_id',$repository->groups(),null,['class'=>'form-control','placeholder'=>'Select a group']) }}
                                    </div>
                                </div>

                                <div class="col-1" style="padding-top: 32px;">
                                    <div class="input-group">
                                        <button  style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{ Form::close() }}
                        {{--</form>--}}
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.Search-panel -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @foreach($students as $student)
                            <div class="card-body page-break">
                                <div class="row" style="padding-bottom: 50px;">
                                    <div class="col-md-2">
                                        <div class="logo" style="float: left">
                                            <img style="width: 100px; height: auto;" src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="scl-dev text-center">
                                            <h4 style="color: #879BE8;">{{ siteConfig('name') }}</h4>
                                            <p>{{ siteConfig('address') }}</p>
                                        </div>
                                        <div class="admit-dec" style="text-align: center; color: #00cc66;">
                                            <h3> <span style="text-transform: uppercase;"> Admit Card </span> <br>
                                                {{ $exam->name }}
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="stuimg" style="float: right" >
                                            <img style="width: 100px; height: auto;" src="{{ asset('assets/img/students') }}/{{ $student->studentId }}.jpg" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    {{--<div class="col-md-8">--}}
                                        {{--<div class="scl-dev">--}}
                                            {{--<h4 style="color: #879BE8;">{{ siteConfig('name') }}</h4>--}}
                                            {{--<p>{{ siteConfig('address') }}</p>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="col-md-4">
                                        <div class="stu-dec">
                                            {{--<h4 style="color: #879BE8;">Muhaimin Sarwar rahi</h4>--}}
                                            {{--<p>Thana Road,Chiring,Chakaria <br>--}}
                                            {{--Cox's Bazar,Chittagong,Bangladesh.--}}
                                            {{--</p>--}}
                                        </div>
                                    </div>
                                </div>
                                <table id="example2" class="table table-bordered">
                                    <tr>
                                        <th>Student's Name : </th>
                                        <td>{{ $student->name }}</td>
                                        <th>StudentID : </th>
                                        <td>{{ $student->studentId }}</td>
                                    </tr>
                                    <tr>
                                        <th>Class :</th>
                                        <td> {{ $student->classes->name }} - {{ $student->section->name ?? '' }}{{ $student->group->name ?? '' }}</td>
                                        <th>Rank :</th>
                                        <td> {{ $student->rank }}</td>
                                    </tr>
                                    <tr>
                                        <th>Father's Name :</th>
                                        <td>{{ $student->father }}</td>
                                        <th>Mother's Name : </th>
                                        <td>{{ $student->mother }}</td>
                                    </tr>
                                    <tr>
                                        <th>Room No :</th>
                                        <td></td>
                                        <th>Seat No :</th>
                                        <td></td>
                                    </tr>
                                </table>

                                <table id="example2" class="table table-bordered table-hover" style="margin-top: 20px;">
                                    <thead>
                                    <tr>
                                        <th>Subjects</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Exam Mark</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($schedules as $schedule)
                                        <tr>
                                            <td>{{ $schedule->subject->name }}</td>
                                            <td>{{ $schedule->date }}</td>
                                            <td>{{ $schedule->start }}</td>
                                            <td>{{ $schedule->end }}</td>
                                            <td>{{ $schedule->objective_full + $schedule->written_full + $schedule->practical_full + $schedule->viva_full }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="card-footer" style="margin-bottom: 10px;">
                                    {{--<h4>Notes & Information</h4>--}}
                                    <div class="row">
                                        <div class="col">
                                            <p>বিঃদ্রঃ অনিবার্য কারণ বশতঃ পরীক্ষার সময়সূচী পরিবর্তন সাধনের ব্যাপারে কর্তৃপক্ষের সিদ্ধান্ত চুড়ান্ত। </p>
                                        </div>
                                        <div class="col-md-3" style="margin-top: 50px;border-top: 1px solid #333;text-align: center;font-weight: bold;">
                                            Principal Signature
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>




@stop
