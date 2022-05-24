@extends('layouts.fixed')

@section('title','Institution Mgnt | Schedule')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Schedule</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Classes</a></li>
                        <li class="breadcrumb-item active">Schedule</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="dec-block">
                                        <div class="ec-block-icon"
                                             style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00AAAA; border-radius: 50%;">
                                            <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                        </div>
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">{{ $class->academicClasses->name ?? '' }}
                                                - {{ $class->section->name ?? '' }}{{ $class->group->name ?? '' }}</h5>
                                            <p>{{ $class->academicClasses->short_name }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="float: right;">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#schedule" data-whatever="@mdo"
                                                style="margin-top: 10px; margin-left: 10px; float: right !important;"><i
                                                    class="fas fa-plus-circle"></i> Class Schedule
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                {{--                                <thead>--}}
                                {{--                                    <tr>--}}
                                {{--                                        <th></th>--}}
                                {{--                                        <th>1st</th>--}}
                                {{--                                        <th>2nd</th>--}}
                                {{--                                        <th>3rd</th>--}}
                                {{--                                        <th>4th</th>--}}
                                {{--                                        <th>5th</th>--}}
                                {{--                                        <th>6th</th>--}}
                                {{--                                        <th>7th</th>--}}
                                {{--                                    </tr>--}}
                                {{--                                </thead>--}}
                                <tbody>
                                @foreach($schedules as $day => $schedule)
                                    <tr>
                                        <td>{{ \App\Day::query()->findOrNew($day)->short_name }}</td>
                                        @foreach($schedule as $sch)
                                            <td>
                                                {{ $sch->subject->name ?? '' }}<br>
                                                {{ $sch->start }} - {{ $sch->end }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***/ Pop Up Model for Add Class Schedule -->
    <div class="modal fade" id="schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Class Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['action'=>'ScheduleController@store','method'=>'post']) }}
                {{ Form::hidden('academic_class_id',$class->id) }}
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col">
                            {{ Form::label('name','Name*',['class'=>'control-label']) }}
                            {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'1st Period, 2nd Period','required']) }}
                        </div>
                        <div class="col">
                            {{ Form::label('day_id','Day*',['class'=>'control-label']) }}
                            {{ Form::select('day_id',$repository->days(),null,['class'=>'form-control','placeholder'=>'Select Day','required']) }}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            {{ Form::label('subject_id','Subject*',['class'=>'control-label']) }}
                            {{--                                {{ Form::select('subject_id',$subjects,null,['class'=>'form-control','placeholder'=>'Select Subject','required']) }}--}}
                            <select name="subject_id" id="" class="form-control">
                                <option value="">Select Subject</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->subject_id }}">{{ $subject->subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            {{ Form::label('teacher_id','Teacher',['class'=>'control-label']) }}
                            {{ Form::select('teacher_id',$teachers,null,['class'=>'form-control','placeholder'=>'Select Teacher']) }}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"> Start* </label>
                            <div class="input-group">
                                <input type="text" name="start" class="form-control timepicker" id=""
                                       aria-describedby="" placeholder="10.00">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"> <i
                                                class="fa fa-clock nav-icon"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4"> End* </label>
                            <div class="input-group">
                                <input type="text" name="end" class="form-control timepicker" id="" aria-describedby=""
                                       placeholder="10.00">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"> <i
                                                class="fa fa-clock nav-icon"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Add Schedule
                    </button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

@stop

@section('script')
    <script>
        function confirmDelete() {
            var x = confirm('Are you sure, you want to unmount this Schedule?');
            return !!x;
        }


        $(document).ready(function () {
//            $('.timepicker')
//                .timepicker({
//              format: 'h:mm p'
//        });
            $('.timepicker').timepicker({
                timeFormat: 'h:mm'
            });
        });

    </script>
@stop

<!-- *** External CSS File-->
@section('style')
    <style>
        .timepicker{
            overflow: hidden;
        }
    </style>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@stop

<!-- *** External JS File-->
@section('plugin')
    <!-- bootstrap time picker -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
@stop
