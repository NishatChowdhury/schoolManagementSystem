@extends('layouts.fixed')

@section('title','Location Assign')
@section('style')
    <style>
    .table tr {
            cursor: pointer;
    }
    .table{
    background-color: #fff !important;
    }
    .hedding h1{
    color:#fff;
    font-size:25px;
    }
    .main-section{
    margin-top: 120px;
    }
    .hiddenRow {
    padding: 0 4px !important;
    background-color: #eeeeee;
    font-size: 13px;
    }
    .accordian-body span{
    color:#a2a2a2 !important;
    }
    </style>
@stop
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
                        {{ Form::open(['action'=>'ReportController@student_fee_report','role'=>'form','method'=>'get']) }}
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

                <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                            <tr class="text-center">
                                <th>Rank</th>
                                <th>Student</th>
                                <th>Id</th>
                                <th>Class</th>
                                <th>Payable Amount</th>
                                <th>Paid Amount</th>
                                <th>Due</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                                    <td>{{ $student->rank }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->studentId }}</td>
                                    <td>
                                        {{ $student->academicClass ? $student->academicClass->name : ''}}
                                        {{ $student->section ? $student->section->name : ''}}
                                        {{ $student->group ? $student->group->name : ''}}
                                    </td>
                                    @php
                                        $setup_amount = ($student->payable($student->id) + $student->fine($student->id))-$student->discount($student->id);
                                        $paid_amount = $student->paid($student->id);
                                    @endphp
                                    <td style="text-align: right">  {{ number_format($setup_amount,2) }} </td>
                                    <td style="text-align: right">  {{ number_format($paid_amount,2) }} </td>
                                    <td style="text-align: right"> {{ number_format($setup_amount-$paid_amount,2) }} </td>
                                </tr>
                                <tr class="p">
                                    <td colspan="7" class="hiddenRow">
                                        <div class="accordian-body collapse p-3" id="demo1">
                                            <table class="table table-striped table-bordered">
                                                <thead class="thead-dark">
                                                    <tr style="text-align: center">
                                                        <th>Date</th>
                                                        <th>Inv No.</th>
                                                        <th>Setup Amount</th>
                                                        <th>Arrears</th>
                                                        <th>Fine</th>
                                                        <th>Discount</th>
                                                        <th>Paid Amount</th>
                                                        <th>Due</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $payments = \App\StudentPayment::query()->where('student_id',$student->id)->get();
                                                @endphp
                                                <tbody>
                                                    @foreach($payments as $payment)
                                                        <tr>
                                                            <td style="text-align: center">{{\Carbon\Carbon::parse($payment->created_at)->format('m F Y')}}</td>
                                                            <td style="text-align: center">{{$payment->id}}</td>
                                                            <td style="text-align: right">{{ number_format($payment->setup_amount,2) }} </td>
                                                            <td style="text-align: right">{{ number_format($payment->arrears,2) }} </td>
                                                            <td style="text-align: right">{{ number_format($payment->fine,2) }}</td>
                                                            <td style="text-align: right">{{ number_format($payment->discount,2) }}</td>
                                                            <td style="text-align: right">{{ number_format($payment->paid_amount,2) }}</td>
                                                            <td style="text-align: right">{{ number_format($payment->due,2) }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">

                    </div>

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
        $('.accordion-toggle').click(function(){
            $('.hiddenRow').hide();
            $(this).next('tr').find('.hiddenRow').show();
        });
    </script>
@stop