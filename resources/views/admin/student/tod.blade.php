@extends('layouts.fixed')

@section('title','Student List')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tod List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Student</a></li>
                        <li class="breadcrumb-item active">Tod List</li>
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
                        {{ Form::open(['action'=>'StudentController@tod','role'=>'form','method'=>'get']) }}
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
                        <table id="example1" class="table table-bordered table-striped table-sm text-sm">
                            <thead class="thead-light">
                            <tr>
                                <th>SL No.</th>
                                <th>STUDENT’S NAME, FATHER’S & MOTHER’S NAME</th>
                                <th>S.S.C EQUIVALENT EXAM ROLL NO. REG NO. & SESSION</th>
                                <th>S.S.C EQUIVALENT EXAM PASSING YEAR & BOARD’S NAME</th>
                                <th>DATE OF ADMISSION, CLASS, GROUP & CLASS ROLL</th>
                                <th>SUBJECTS NAME WITH CODE WHICH ARE APPROVED BY THE BOARD. (EXAMPLE: BENGALI-101,102)</th>
                                <th>REMARK</th>
                            </tr>
                            <tr class="text-center">
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th>6</th>
                                <th>7</th>
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
                                        ROLL: {{ $student->ssc_roll }}<br>
                                        REG : {{ $student->ssc_registration ?? '' }}<br>
                                        SESS: {{ $student->ssc_session ?? '' }}
                                    </td>
                                    <td>
                                        {{ $student->ssc_year ?? '' }}<br>
                                        {{ $student->ssc_board ??'' }}
                                    </td>
                                    <td>
                                        {{ $student->created_at->format('d/m/Y') }}<br>
                                        {{ $student->classes->name ?? '' }}<br>
                                        {{ $student->group->name ?? '' }}, {{ $student->rank ?? 0 }}
                                    </td>
                                    <td>
{{--                                        @if($student->admission)--}}
{{--                                            @foreach(json_decode($student->admission->subjects) as $subjects)--}}
{{--                                                @foreach($subjects as $subject)--}}
{{--                                                    <span class="subjects">{{ \App\OnlineSubject::query()->findOrNew($subject)->code }}</span>&nbsp;<span class="{{ \App\OnlineSubject::query()->findOrNew($subject)->code2 != '' ? 'subjects' : '' }}">{{ \App\OnlineSubject::query()->findOrNew($subject)->code2 }}</span>--}}
{{--                                                @endforeach--}}
{{--                                            @endforeach--}}
{{--                                        @endif--}}
                                        @if(is_object(json_decode($student->subjects)))
                                            @foreach(json_decode($student->subjects) as $subjects)
                                                @foreach($subjects as $subject)
                                                    <span class="subjects">{{ \App\OnlineSubject::query()->findOrNew($subject)->code }}</span>&nbsp;<span class="{{ \App\OnlineSubject::query()->findOrNew($subject)->code2 != '' ? 'subjects' : '' }}">{{ \App\OnlineSubject::query()->findOrNew($subject)->code2 }}</span>
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </td>
                                    <td></td>
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
        td .subjects:after{
            content: ",";
        }
        td .subjects:last-child:after{
            content: ""
        }
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
@stop
