@extends('layouts.fixed')

@section('title','eSIF')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">eSIF</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Student</a></li>
                        <li class="breadcrumb-item active">eSIF</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- /.Search-panel -->
    <section class="content no-print">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin: 10px;">
                        <!-- form start -->
                        {{ Form::open(['action'=>'StudentController@esif','role'=>'form','method'=>'get']) }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Session</label>
                                    <div class="input-group">
                                        {{ Form::select('session_id',$repository->sessions(),null,['class'=>'form-control','placeholder'=>'Select Session']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Class</label>
                                    <div class="input-group">
                                        {{ Form::select('class_id',$repository->classes(),null,['class'=>'form-control','placeholder'=>'Select Class']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Group</label>
                                    <div class="input-group">
                                        {{ Form::select('group_id',$repository->groups(),null,['class'=>'form-control','placeholder'=>'Select Group']) }}
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
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.Search-panel -->

@if($class && $group)
    <div class="only-print text-center">
        <h3>{{ siteConfig('name') }}</h3>
        <p>EIIN: {{ siteConfig('eiin') }} | Class: {{ $class->name }} | Group: {{ $group->name }}</p>
    </div>
@endif


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Total Found : {{ count($students) }}</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-light">
                            <tr>
                                <th>eSIF</th>
                                <th>APPLICANT’S NAME <br> FATHER’S NAME <br> MOTHER’S NAME</th>
                                <th>GENDER <br> DOB</th>
                                <th>SECTION <br> CLASS <br> ROLL</th>
                                <th>SUBJECTS</th>
                                <th>OPT SUB</th>
                                <th>PASS YEAR <br> ROLL NO <br> BOARD <br> REG NO</th>
                                <th>PHOTO</th>
                                <th class="only-print">STUDENT SIGNATURE</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $x = 1 @endphp
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $x++ }}</td>
                                    <td>
                                        {{ $student->name }}<br>
                                        {{ $student->father }}<br>
                                        {{ $student->mother }}
                                    </td>
                                    <td>
                                        {{ $student->gender->name ?? '' }}<br>
                                        {{ $student->dob }}
                                    </td>
                                    <td>
                                        {{ $student->section->name ?? '' }}<br>
                                        {{ $student->classes->name }}<br>
                                        {{ $student->rank }}
                                    </td>
                                    <td>
                                        @foreach(json_decode($student->admission->subjects) as $subjects)
                                            @foreach($subjects as $subject)
                                                <span class="subjects">{{ \App\OnlineSubject::query()->findOrNew($subject)->code }}</span>&nbsp;<span class="{{ \App\OnlineSubject::query()->findOrNew($subject)->code2 != '' ? 'subjects' : '' }}">{{ \App\OnlineSubject::query()->findOrNew($subject)->code2 }}</span>
                                            @endforeach
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(json_decode($student->admission->subjects)->optional as $subjects)
                                            <span class="subjects">{{ \App\OnlineSubject::query()->findOrNew($subject)->code }}</span>&nbsp;<span class="{{ \App\OnlineSubject::query()->findOrNew($subject)->code2 != '' ? 'subjects' : '' }}">{{ \App\OnlineSubject::query()->findOrNew($subject)->code2 }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ $student->admission->ssc_year }}<br>
                                        {{ $student->admission->ssc_roll }}<br>
                                        {{ $student->admission->ssc_board }}<br>
                                        {{ $student->admission->ssc_registration }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('assets/img/students') }}/{{ $student->image }}" alt="" height="75">
                                    </td>
                                    <td class="only-print"></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@stop

@section('style')
    <style>
        tbody td{
            text-transform: uppercase;
        }

        @media print {
            @page{
                margin: 15mm 5mm;
            }
            body{
                font-size: .8rem;
            }
        }
    </style>
    <style>
        td .subjects:after{
            content: ",";
        }
        td .subjects:last-child:after{
            content: ""
        }
        tbody td{
            text-transform: uppercase;
        }
    </style>
@stop
