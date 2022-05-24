@extends('layouts.fixed')

@section('title','Attendance | Teacher Attendance')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Teacher Attendances </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Attendance</a></li>
                        <li class="breadcrumb-item active">Teacher Attendances</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content no-print">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            {{ Form::open(['route'=>'attendance.teacher','method'=>'get']) }}
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {{ Form::label('USER') }}
                                    {{ Form::select('staff_type_id',[0=>'Select User',1=>'STAFF',2=>'TEACHER'],null,['class'=>'form-control']) }}
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="form-group">
                                        {{ Form::text('date',null,['class'=>'form-control datePicker','placeholder'=>'Select Date','required']) }}
                                    </div>
                                </div>

                                <div class="form-group col-md-1" style=" margin:29px 0 0 0;">
                                    <input type="submit" class="btn btn-info" value="search">
                                </div>

                            </div>
                            {{  Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***/Teacher Attendances page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Daily Employee Attendance Report</h4>
                            <h5 class="text-center">Date: {{ $date }}</h5>
                        </div>
                        <div class="card-body" style="padding: 1.00rem;">
                            <div class="row" style="padding: 10px;">
                                <div class="col-md-2">
                                    <div class="dec-block">
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px; font-weight: bold">Total</h5>
                                            <p><span class="badge badge-info" style="color: black; padding: 5px 45px; font-size: 18px">{{ count($staffs) }}</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dec-block">
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px; font-weight: bold">Present</h5>
                                            <p>
                                                    <span class="badge badge-success" style="color: black; padding: 5px 30px; font-size: 18px">
00
                                                    </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dec-block">
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px; font-weight: bold">Late</h5>
                                            <p><span class="badge badge-primary" style="color: black; padding: 5px 45px; font-size: 18px">00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dec-block">
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px; font-weight: bold">Left Early</h5>
                                            <p><span class="badge badge-warning" style="color: black; padding: 5px 35px; font-size: 18px">00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dec-block">
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px; font-weight: bold">Absent</h5>
                                            <p><span class="badge badge-danger" style="color: black; padding: 5px 28px; font-size: 18px">
00
                                                </span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dec-block">
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px; font-weight: bold">Leave</h5>
                                            <p><span class="badge badge-dark" style="color: black; padding: 5px 28px; font-size: 18px">
00
                                                </span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Employee</th>
                                    <th style="text-align: center">Card ID</th>
                                    <th style="text-align: center">Designation </th>
                                    <th style="text-align: center">Enter</th>
                                    <th style="text-align: center">Exit</th>
                                    <th style="text-align: center">Status</th>
                                    <th style="text-align: center">Is Notified</th>
                                </tr>
                                </thead>
                                <tbody id="indTeacher">
                                @foreach($attend as $staff)
                                    <tr>
                                        <td><a href="">{{ $staff->name }}</a> </td>
                                        <td>{{ $staff->card }}</td>
                                        <td>{{ $staff->designation }}</td>
                                        <td style="text-align: center">{{ $staff->enter }}</td>
                                        <td style="text-align: center">{{ $staff->exit }}</td>
                                        <td style="text-align: center">{{ $staff->status }}</td>
                                        <td>{{ $staff->is_notified }}</td>
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
    </section>
@stop

@section('plugin-css')

    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <link rel="stylesheet" href="{{asset('/plugins/select2/select2.min.css')}}">

@stop

@section('plugin')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
    <script src= "{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>

@stop


@section('script')
    <script>

        $('.datePicker')
            .datepicker({
                format: 'yyyy-mm-dd'
            });

        // $("#indAttendanceTeacher").submit(function (e) {
        //     e.preventDefault();
        //
        //     $.ajax({
        //         method: $(this).attr('method'),
        //         url : $(this).attr('action'),
        //         data: $(this).serialize(),
        //         dataType:'html',
        //         success:function (res) {
        //             $("#indTeacher").html(res);
        //             console.log(res);
        //         }
        //     });
        // });


        //Date range as a button
        $(function () {
            $('.select2').select2();
        });
    </script>
@stop
