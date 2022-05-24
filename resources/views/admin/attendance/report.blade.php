@extends('layouts.fixed')

@section('title','Attendance | Monthly Report')

@section('style')
    <style>
        @media (min-width: 992px) {
            #atn_result_show{
                font-size: 13px;
            }
            .table td, th{
                padding: .5rem;
            }
        }
    </style>
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Attendance Monthly Report </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Attendance Monthly Report</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            {{ Form::open(['action'=>'AttendanceController@report','method'=>'get']) }}
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="">User</label>
                                        <div class="input-group">
                                            {{ Form::select('user',[1=>'Student',2=>'Employee'],null,['class'=>'form-control','placeholder'=>'Select Session','required']) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Year</label>
                                        <div class="input-group">
                                            {{ Form::selectRange('year',2020,2021,null,['class'=>'form-control','placeholder'=>'Session','required']) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Month</label>
                                        <div class="input-group">
                                            {{ Form::selectMonth('month',null,['class'=>'form-control','placeholder'=>'Select Month','required']) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="class">Class</label>
                                        <div class="input-group">
                                            <select name="class_id" id="class" class="form-control">
                                                <option value="">Select Class</option>
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
                        <div class="col-md-3">
                            <div>
                                <ul style="list-style: none">
                                    <li> <i class="fas fa-circle" style="color: #008000"></i> <span> P - Present </span></li>
                                    <li> <i class="fas fa-circle" style="color: #00bfff"></i> <span> D - Late/Delay </span></li>
                                    <li> <i class="fas fa-circle" style="color: #ffa500"></i> <span> R - Left without completing the day </span></li>
                                    <li> <i class="fas fa-circle" style="color: #ff0000"></i> <span> A - Absent </span></li>
                                    <li> <i class="fas fa-circle" style="color: #878484"></i> <span> L - Leave </span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(count($students) > 0)
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Month Name :
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="att-table">
                                <table class="table table-bordered table-responsive" id="atn_result_show">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Roll</th>
                                        <th style="padding-left: 10px">Name</th>
                                        @for($i = 1;$i<=cal_days_in_month(CAL_GREGORIAN, $month, $year);$i++)
                                            <th style="padding-left: 10px">{{ $i }}</th>
                                        @endfor
                                    </tr>
                                    </thead>
                                    <tbody id="atn_result_show">
                                    @foreach($students as $student)
                                        {{--            {{dd($student)}}--}}
                                        <tr>
                                            <th>{{ $student->rank }}</th>
                                            <th>{{ $student->name }}</th>
                                            @for($i = 1;$i<=cal_days_in_month(CAL_GREGORIAN, $month, $year);$i++)
                                                @if($i < 10)
                                                    @php $i = '0'.$i @endphp
                                                @endif
{{--                                                @if($month < 10)--}}
{{--                                                    @php $month = '0'.$month @endphp--}}
{{--                                                @endif--}}
                                                <td>
                                                    @php
                                                        $attn = \App\RawAttendance::query()
                                                                    ->where(function($query)use($student){
                                                                        $query->where('registration_id',$student->studentId)->orWhere('registration_id',$student->card_id);
                                                                    })
                                                                    ->where('access_date','like',Carbon\Carbon::createFromDate($year,$month)->format('Y-m').'-'.$i.'%')
                                                                    ->get();

                                                    $isWeeklyOff = \App\weeklyOff::query()->where('show_option','like','%'.Carbon\Carbon::make($year.'-'.$month.'-'.$i)->dayOfWeekIso.'%')->exists();
                                                    $isHoliday = App\HolidayDuration::query()->whereDate('date',$year.'-'.$month.'-'.$i)->exists();
                                                    $inLeave = \App\StudentLeave::query()->where('student_id',$student->id)->where('date',$year.'-'.$month.'-'.$i)->exists();

                                                    $shiftInTime = App\Shift::query()->first()->start;
                                                    $shiftOutTime = App\Shift::query()->first()->end;
                                                    $grace = App\Shift::query()->first()->grace;

                                                    $shiftInTime = Carbon\Carbon::make($year.'-'.$month.'-'.$i.' '.$shiftInTime)->addMinutes($grace);
                                                    $shiftOutTime = Carbon\Carbon::make($year.'-'.$month.'-'.$i.' '.$shiftOutTime);
                                                    if($attn->count() > 0){
                                                        $enter = $attn->first()->access_date;
                                                        $exit = $attn->last()->access_date;

                                                       $isLate = $enter > $shiftInTime;
                                                       $isEarly = $exit < $shiftOutTime;
                                                    }

                                                    @endphp
                                                    @if($attn->count() > 0)
                                                        @if($isLate)
                                                            <span style="color:white; background: deepskyblue" class="badge">D</span>
                                                        @elseif($isEarly)
                                                            <span style="color:white; background: Orange" class="badge">E</span>
                                                        @else
                                                            <span style="color:white; background: green" class="badge">P</span>
                                                        @endif
                                                    @else
                                                        @if($isWeeklyOff)
                                                            <span style="color:white; background: greenyellow" class="badge">W</span>
                                                        @elseif($isHoliday)
                                                            <span style="color:white; background: darkviolet" class="badge">H</span>
                                                        @elseif($inLeave)
                                                            <span style="color:white; background: #878484" class="badge">L</span>
                                                        @else
                                                            <span style="color:white; background: red" class="badge">A</span>
                                                        @endif
                                                    @endif
                                                </td>
                                            @endfor
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <div ><h4 id="erro-box" style="text-align: center; color:red; display: none" >Attendance Not Found</h4></div>
        </div><!-- /.container-fluid -->
    </section>    <!-- /.content -->
    @endif
@stop
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#resultSearchForm').submit(function (e) {
            e.preventDefault();
            var formData = $( this ).serialize();

            $.ajax({
                url: '{{ url('/get_attendance_monthly') }}',
                data: formData,
                type: 'POST',
                error: function(xhr, ajaxOptions, thrownError) {
                    if(xhr.status==404) {
                        $('#erro-box').css('display','');
                        $("#erro-box").fadeOut(5000);
                    }
                },
                success: function(data) {
                    $("#atn_result_show").html(data);
                    $("#atn_result_show").html(data);

                }

            });

        });
    </script>
@endsection

