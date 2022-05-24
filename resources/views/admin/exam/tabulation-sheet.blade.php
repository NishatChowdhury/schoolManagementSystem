@extends('layouts.fixed')

@section('title','Exam Management |Tabulation Sheet')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tabulation Sheet</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Exam Management</a></li>
                        <li class="breadcrumb-item active">Tabulation Sheet</li>
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
                    <div class="card" style="margin: 10px;">
                        <!-- form start -->
                        {{ Form::open(['action'=>'ExamController@tabulationSheet','role'=>'form','method'=>'get']) }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Class</label>
                                    <div class="input-group">
                                        {{ Form::select('class_id',$repository->classes(),null,['class'=>'form-control','placeholder'=>'Select Class','required']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Section</label>
                                    <div class="input-group">
                                        {{ Form::select('section_id',$repository->sections(),null,['class'=>'form-control','placeholder'=>'Select Section']) }}
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
    @if($results)

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="scl-dec" style="padding-left: 300px;">
                                        <div class="logo" style="float: left">
                                            <img src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}" alt="logo" height="100">
                                        </div>
                                        <div class="scl-name" style="float: left; padding-left:50px; padding-top: 20px; text-align: center;">
                                            <h2>{{ siteConfig('name') }}</h2>
                                            <h4>Result Sheet of Yearly</h4>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="head" style="text-align: center;">
                                        <h3>Class {{ $results->first()->student->academicClass->name }}
                                            ({{ $results->first()->student->section->name ?? '' }}{{ $results->first()->student->group->name ?? '' }})</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Student ID</th>
                                                    <th>Student Name</th>
                                                    <th>Roll No</th>
                                                    @foreach($subjects as $subject)
                                                        <td>{{ $subject->subject->short_name }}</td>
                                                    @endforeach
                                                    <th>Total Mark</th>
                                                    <th>GPA</th>
                                                    <th>Rank</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($results as $result)
                                                    <tr>
                                                        <td>{{ $result->student->studentId }}</td>
                                                        <td>{{ $result->student->name }}</td>
                                                        <td>{{ $result->student->rank }}</td>
                                                        @foreach($subjects as $subject)
                                                            <td>
                                                                {{ \App\FinalMark::query()
                                                                //->where('class_id',$result->class_id)
                                                                //->where('section_id',$result->section_id)
                                                                //->where('group_id',$result->group_id)
                                                                ->where('subject_id',$subject->subject_id)
                                                                ->where('student_id',$result->student_id)
                                                                ->first()
                                                                ->total_mark }}
                                                            </td>
                                                        @endforeach
                                                        <td>{{ $result->total_mark }}</td>
                                                        <td><b>{{ $result->gpa }}</b></td>
                                                        <td>{{ $result->rank }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif


@stop