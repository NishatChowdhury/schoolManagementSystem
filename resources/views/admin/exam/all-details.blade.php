@extends('layouts.fixed')

@section('title', 'Exam Mgmt | Result Details')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Result Details</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.Search-panel -->
    <section class="content no-print">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin: 10px;">
                        <!-- form start -->
                        {{ Form::open(['action'=>'ResultController@allDetails','role'=>'form','method'=>'get']) }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Session</label>
                                    <div class="input-group">
                                        {{ Form::select('session_id',$repository->sessions(),null,['class'=>'form-control','placeholder'=>'Select Session']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Exam Name</label>
                                    <div class="input-group">
                                        {{ Form::select('exam_id',$repository->exams(),null,['class'=>'form-control','placeholder'=>'Exam Name']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Student ID</label>
                                    <div class="input-group">
                                        {{ Form::text('studentId',null,['class'=>'form-control','placeholder'=>'Student ID']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="class">Class</label>
                                    <div class="input-group">
                                        <select name="class_id" id="class" class="form-control">
                                            @foreach($repository->academicClasses() as $class)
                                                <option value="{{ $class->id }}">{{ $class->academicClasses->name ?? '' }}&nbsp;{{ $class->group->name ?? '' }}{{ $class->section->name ?? '' }}</option>
                                            @endforeach
                                        </select>
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

    @foreach($results as $result)
        <section class="content" style="page-break-after: always">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="col-lg-12 mx-auto">
                                    <div class="my-4 text-center">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}" width="100" alt="">
                                            </div>
                                            <div class="col-md-8">
                                                <h3>{{ siteConfig('name') }}</h3>
                                                <h5>{{ siteConfig('address') }}</h5>
                                                <h4>{{ $result->exam->name }}</h4>
                                            </div>
                                            <div class="col-md-2">
                                                <img src="{{ asset('assets/img/students') }}/{{ $result->student->image }}" width="100" alt="" style="border: 2px black solid;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <table id="" class="table">
                                    <tr>
                                        <th>Student's Name : </th>
                                        <td>{{ $result->student->name ?? '' }}</td>
                                        <th>Exam Name : </th>
                                        <td>{{ $result->exam->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>StudentID : </th>
                                        <td>{{ $result->student->studentId }}</td>
                                        <th>Date : </th>
                                        <td>{{ $result->exam->start }} - {{ $result->exam->end }}</td>
                                    </tr>
                                    <tr>
                                        <th>Class :</th>
                                        <td>{{ academicClass($result->academic_class_id) }}</td>
                                        <th>Grade : </th>
                                        <td>{{ $result->grade }}</td>
                                    </tr>
                                    <tr>
                                        <th>Current Rank :</th>
                                        <td>{{ $result->student->rank }}</td>
                                        <th>Grade Point :</th>
                                        <td>{{ $result->gpa }}</td>
                                    </tr>
                                    <tr>
                                        <th>Result Rank :</th>
                                        <td>{{ $result->rank }}</td>
                                        <th>Total Marks :</th>
                                        <td>{{ $result->total_mark }}</td>
                                    </tr>
                                </table>

                                @php
                                    $marks = App\Mark::query()
                                        ->where('student_id',$result->student_id)
                                        ->where('exam_id',$result->exam_id)
                                        ->where('academic_class_id',$result->academic_class_id)
                                        //->where('class_id',$result->class_id)
                                        //->where('session_id',$result->session_id)
                                        ->join('subjects','subjects.id','=','marks.subject_id')
                                        ->select('marks.*','subjects.level')
                                        ->orderBy('level')
                                        ->get();
                                @endphp

                                <table id="" class="table table-bordered" style="margin-top: 60px;">
                                    <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Code</th>
                                        <th>Exam Mark</th>
                                        <th>Result Mark</th>
                                        {{--                                    <th>Description</th>--}}
                                        <th>Grade</th>
                                        <th>Grade point</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($marks as $mark)
                                        <tr>
                                            <td>{{ $mark->subject->name }}</td>
                                            <td>{{ $mark->subject->code }}</td>
                                            <td>{{ $mark->full_mark }}</td>
                                            <td>
                                                @if($mark->objective > 0)
                                                    Objective: {{ $mark->objective }}<br>
                                                @endif
                                                @if($mark->written > 0)
                                                    Written: {{ $mark->written }}<br>
                                                @endif
                                                @if($mark->practical > 0)
                                                    Practical: {{ $mark->practical }}<br>
                                                @endif
                                                @if($mark->viva > 0)
                                                    Viva: {{ $mark->viva }}
                                                @endif
                                            </td>
                                            {{--                                        <td></td>--}}
                                            <td>{{ $mark->grade }}</td>
                                            <td>{{ $mark->gpa }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                <div class="row">
                                    <div class="col text-center mt-4">Powered By <b> Web Point Ltd.</b></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

@stop
