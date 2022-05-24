@extends('layouts.fixed')

@section('title','Add Leave')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Leave Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add New Leave</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-light">
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <!-- /.card-header -->
                        <!-- form start -->
                        {!!  Form::open(['action'=>'LeaveManagementController@store', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('student_id', 'Student Id',['class'=>'control-label' ]) }}
                                        {{ Form::text('student_id', null, ['placeholder' => 'Enter Student ID...','class'=>'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('start_date','Start Date',['class'=>'control-label']) }}
                                        {{ Form::date('start_date',null,['class'=>'form-control', 'placeholder'=>'Start Date','id'=>'start_date']) }}
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('end_date','End Date',['class'=>'control-label']) }}
                                        {{ Form::date('end_date',null,['class'=>'form-control', 'placeholder'=>'End Date','id'=>'end_date']) }}
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('leave_purpose_id','Leave Purpose',['class'=>'control-label']) }}
                                        {{ Form::select('leave_purpose_id',$leave_purpose,null,['class'=>'form-control', 'placeholder'=>'Select Leave Purpose:','id'=>'leave_purpose_id']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Submit', ['class' => 'form-control, btn btn-success btn-block']) !!}
                            </div>
                        </div>


                        {!! Form::close() !!}
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop


