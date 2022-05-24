@extends('layouts.fixed')

@section('title', 'Exam Mgmt | Exam Schedules')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Exam Schedules : {{\App\Exam::query()->FindOrfail($examId)->name}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Exam</a></li>
                        <li class="breadcrumb-item active">Exam Schedules</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="row">
            <div class="col-12">
                {!! Form::open(['action'=>'ExamController@store_schedule', 'method'=>'post']) !!}
                    {!! Form::hidden('session_id', $session_id, []) !!}
                    {!! Form::hidden('exam_id', $examId, []) !!}
                    {!! Form::hidden('class_id', $class_id, []) !!}
                    {!! Form::hidden('exam_type', $exam_type, []) !!}
                    <table class="table-responsive table-bordered table-hover">
                        <thead>
                            <tr>
                                <th colspan="7" class="text-center"></th>
                            </tr>
                            <tr>
                                <th>SL</th>
                                <th class="text-center">Subject Name</th>
                                <th class="text-center">Full Marks</th>
                                <th class="text-center">Exam date</th>
                                <th class="text-center">Exam Start</th>
                                <th class="text-center">Exam End</th>
                                <th class="text-center">Teacher</th>
                            </tr>
                        </thead>
                        @php($i=1)
                    @foreach($subjects as $sub)
                    <tr>
                        <td class="text-center">{{$i++}}</td>
                        <th class="text-center">{{$sub->subject->name}}</th>
                        {!! Form::hidden('subject_id[]', $sub->id,[]) !!}
                        <td>
                            <div class="input-group">
                                {{ Form::text('full_marks[]',null,['class'=>'form-control', 'aria-describedby'=>""]) }}

                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                {{ Form::text('date[]',null,['class'=>'form-control datePicker', 'aria-describedby'=>""]) }}
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                {{ Form::text('start[]',null,['class'=>'form-control', 'aria-describedby'=>""]) }}
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-clock"></i></span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                {{ Form::text('end[]',null,['class'=>'form-control', 'aria-describedby'=>""]) }}
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-clock"></i></span>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ Form::select('teacher_id[]', $teachers, $sub->teacher_id, ['class'=>'form-control']) }}
                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td class="text-right" colspan="7">
                            <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                        </td>
                    </tr>
                </table>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@stop

<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">
@stop
<!-- *** External JS File-->
@section('plugin')
    <script src= "{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.datePicker')
                .datepicker({
                    format: 'yyyy-mm-dd'
                })
        });
    </script>
@stop
