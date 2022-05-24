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
                        {{ Form::open(['action'=>'ReportController@student_monthly_fee_report','role'=>'form','method'=>'get']) }}
                        <div class="card-body">
                            <div class="form-row">
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

                                <div class="col">
                                    <label for="">Month</label>
                                    <div class="input-group">
                                        {{ Form::selectMonth('month',null,['class'=>'form-control','placeholder'=>'Select Month']) }}
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
                        <h3 class="card-title"><span style="padding-right: 10px;"><i class="fas fa-user-graduate" style="border-radius: 50%; padding: 15px; background: #3d807a;"></i></span>Total Found : {{ count($students) }}  || Month Name: {{  strtoupper(date('F', mktime(0, 0, 0, $monthId, 1 ))) }}</h3>

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
                                <th>Fee Amount</th>
                                <th>Transport</th>
                                <th>Arrears</th>
                                <th>Total Amount</th>
                                <th>Paid Amount</th>
                                <th>Discount</th>
                                <th>Due</th>
                            </tr>
                            </thead>
                            @php
                                $totalMonthSetAmount = $totalTransport = $totalArrears = $totalPaidAmount = $totalDiscount = 0;
                            @endphp
                            <tbody>
                            @foreach($students as $student)
                                <tr >
                                    <td>{{ $student->rank }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->studentId }}</td>
                                    <td>
                                        {{ $student->academicClass ? $student->academicClass->name : ''}}
                                        {{ $student->section ? $student->section->name : ''}}
                                        {{ $student->group ? $student->group->name : ''}}
                                    </td>
                                    @php
                                        $setup_amount = \App\StudentPayment::query()->where('student_id',$student->id)->where('month',$monthId)->sum('setup_amount');
                                        $transport = \App\StudentPayment::query()->where('student_id',$student->id)->where('month',$monthId)->sum('transport');
                                        $arrears = \App\StudentPayment::query()->where('student_id',$student->id)->where('month',$monthId)->sum('arrears');
                                        $discount = \App\StudentPayment::query()->where('student_id',$student->id)->where('month',$monthId)->sum('discount');
                                        $due = \App\StudentPayment::query()->where('student_id',$student->id)->where('month',$monthId)->sum('due');
                                        $paid_amount = \App\StudentPayment::query()->where('student_id',$student->id)->where('month',$monthId)->sum('paid_amount');

                                    @endphp
                                    <td style="text-align: right"> {{ number_format($monthSetup ? $monthSetup : 0, 2) }}  </td>
                                    <td style="text-align: right"> {{ number_format($transport ? $transport : 0, 2) }}  </td>
                                    <td style="text-align: right"> {{ number_format($arrears ? $arrears : 0, 2) }}  </td>
                                    <td style="text-align: right"> {{ number_format($monthSetup + $transport + $arrears, 2) }}  </td>
                                    <td style="text-align: right">  {{ number_format($paid_amount,2) }} </td>
                                    <td style="text-align: right">  {{ number_format($discount,2) }} </td>
                                    <td style="text-align: right">  {{ number_format(($monthSetup + $transport + $arrears) - ($paid_amount + $discount),2) }}</td>
                                </tr>
                                @php
                                    $totalMonthSetAmount+=$monthSetup;
                                    $totalTransport+=$transport;
                                    $totalArrears+=$arrears;
                                    $totalPaidAmount+=$paid_amount;
                                    $totalDiscount+=$discount;
                                @endphp
                            @endforeach
                            </tbody>
                            <tfoot >
                                <tr ">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: right">{{ number_format($totalMonthSetAmount,2) }}</td>
                                    <td style="text-align: right;font-weight: bold">{{ number_format($totalTransport,2) }}</td>
                                    <td style="text-align: right;font-weight: bold">{{ number_format($totalArrears,2) }}</td>
                                    <td style="text-align: right;font-weight: bold">{{ number_format(($totalMonthSetAmount+$totalTransport+$totalArrears),2) }}</td>
                                    <td style="text-align: right;font-weight: bold">{{ number_format($totalPaidAmount,2) }}</td>
                                    <td style="text-align: right;font-weight: bold">{{ number_format($totalDiscount,2) }}</td>
                                    <td style="text-align: right;font-weight: bold">{{ number_format((($totalMonthSetAmount+$totalTransport+$totalArrears)-($totalPaidAmount+$totalDiscount)),2) }}</td>
                                </tr>
                            </tfoot>

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