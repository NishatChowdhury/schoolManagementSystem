@extends('layouts.fixed')

@section('title', 'Exam Mgmt | Examinations')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Examinations</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Exam Mgmt</a></li>
                        <li class="breadcrumb-item active">Examinations</li>
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
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="dec-block">--}}
{{--                                        <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00AAAA; border-radius: 50%;" >--}}
{{--                                            <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>--}}
{{--                                        </div>--}}
{{--                                        <div class="dec-block-dec" style="float:left;">--}}
{{--                                            <h5 style="margin-bottom: 0px;">Total Found</h5>--}}
{{--                                            <p>00</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="float: left;">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addexam" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Exam Name</th>
                                    <th>Session</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Notify Exam</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($exams as $exam)
                                <tr>
                                    <td>{{ $exam->name }}</td>
                                    <td>{{ $exam->session->year ?? '' }}</td>
                                    <td>{{ $exam->start }}</td>
                                    <td>{{ $exam->end }}</td>
                                    <td>{{ $exam->status }}</td>
                                    <td>{{ $exam->notify == 1 ? "Notify" : "Don't Notify" }}</td>
                                    <td>
                                        {{ Form::open(['action'=>['ExamController@destroy',$exam->id],'method'=>'delete','onsubmit'=>'return deleteConfirm()']) }}
                                        <a href="{{ action('ExamSeatPlanController@seatPlan',$exam->id) }}" class="btn btn-dark btn-sm" title="Exam Set Plan"><i class="fa fa-th"></i></a>

                                        <a href="{{ action('ExamController@schedule',$exam->id) }}" class="btn btn-info btn-sm" title="Exam Schedule"><i class="far fa-calendar-alt"></i></a>
                                        <a href="{{ action('ResultController@tabulation',$exam->id) }}" class="btn btn-dark btn-sm" title="Tabulation Sheet"><i class="fas fa-list-ol"></i></a>
{{--                                        <a type="button" href="{{ action('ExamController@delete_exam',$exam->id) }}" class="btn btn-danger btn-sm" style="margin-left: 5px;" title="Delete"><i class="fas fa-trash "></i></a>--}}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></button>
                                        <a href="{{ action('ResultController@generateResult',$exam->id) }}" role="button" class="btn btn-success btn-sm"><i class="fas fa-sync-alt"></i></a>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-sm-12 col-md-9">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#">First</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Last</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***/ Pop Up Model for  New Grade System Item button -->
    <div class="modal fade" id="addexam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['action'=>'ExamController@store_exam', 'method'=>'post']) !!}

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Name*</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" name="name" class="form-control" id="name"  aria-describedby="" placeholder="">
                                    {{--{{ Form::text('title',null,['class'=>'form-control']) }}--}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Year</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    {{ Form::select('session_id',$repository->sessions(),null,['class'=>'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Start</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    {{ Form::text('start',null,['class'=>'form-control datePicker', 'placeholder'=>'Starting Date']) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">End</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    {{ Form::text('end',null,['class'=>'form-control datePicker', 'placeholder'=>'Ending Date']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right"></label>
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <input name="notify" class="form-check-input" type="checkbox" value=1 id="">
                                    <label class="form-check-label" for="defaultCheck1">
                                       Notify Exam Result
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div style="float: right; margin-right: 75px;">
                            <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                        </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for  New Grade System Item button -->
@stop

<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">
@stop
<!-- *** External JS File-->
@section('plugin')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
    <script src= "{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
@stop

@section('script')
    <script type="text/javascript">
        $('.datePicker')
            .datepicker({
                format: 'yyyy-mm-dd'
            });
    </script>
    <script>
        function deleteConfirm(){
            var x = confirm('Are you sure you want to delete this exam? All data regarding this exam will be erased!!!');
            return !!x;
        }
    </script>
@stop
