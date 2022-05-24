@extends('layouts.fixed')

@section('title','Location Assign')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Finance</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Location Assign</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- /.Search-panel -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin: 10px;">
                        <!-- form start -->
                        {{ Form::open(['action'=>'TransportController@student_list','role'=>'form','method'=>'get']) }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Student ID</label>
                                    <div class="input-group">
                                        {{ Form::text('studentId',null,['class'=>'form-control','placeholder'=>'Student ID']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Name</label>
                                    <div class="input-group">
                                        {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Class</label>
                                    <div class="input-group">
                                        {{ Form::select('class_id',$repository->classes(),null,['class'=>'form-control','placeholder'=>'Select Class']) }}
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


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"><span style="padding-right: 10px;"><i class="fas fa-user-graduate" style="border-radius: 50%; padding: 15px; background: #3d807a;"></i></span>Total Found : {{ count($students) }}</h3>
                        <div class="card-tools">
                            <a href="" class="btn btn-success btn-sm" style="padding-top: 5px; margin-left: 60px;"><i class="fas fa-plus-circle"></i> New</a>
                            <a href="" class="btn btn-primary btn-sm"><i class="fas fa-cloud-download-alt"></i> CSV</a>
                        </div>
                    </div>
                {{ Form::open(['action'=>'TransportController@transport_assign','method'=>'post']) }}
                <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                            <tr class="text-center">
                                <th>Rank</th>
                                <th>Student</th>
                                <th>Id</th>
                                <th>Class</th>
                                <th>
                                    {{--@if($students != [])--}}
                                    {{--{{ Form::select('sub',$repository->optionals($students->first()->class_id),null,['class'=>'form-control','id'=>'sub']) }}--}}
                                    {{--@endif--}}
                                    Location
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->rank }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->studentId }}</td>
                                    <td>
                                        {{ $student->academicClass ? $student->academicClass->name : ''}}
                                        {{ $student->section ? $student->section->name : ''}}
                                        {{ $student->group ? $student->group->name : ''}}
                                    </td>
                                    <td>
                                        {{ Form::hidden('student_id[]',$student->id) }}
                                        {{ Form::select('location_id[]',$trnsport_fee,null,['class'=>'form-control sub','placeholder' => 'Select Location']) }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        {{ Form::submit('ASSIGN TRANSPORT',['class'=>'btn btn-info']) }}
                    </div>
                {{ Form::close() }}
                <!-- /.card-body -->
                {{--<div class="card-body">--}}
                {{--{{ $students->appends(Request::except('page'))->links() }}--}}
                {{--</div>--}}
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

@section('script')
    <script>
        $("#sub").change(function(){
            var subject = $("#sub").val();
            $(".sub").val(subject);
        })
    </script>
@stop
