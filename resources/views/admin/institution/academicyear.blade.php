@extends('layouts.fixed')

@section('title','Institution Mgnt | Academic Year')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Academic Year</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Institution Mgnt</a></li>
                        <li class="breadcrumb-item active">Academic Year</li>
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
                                {{--<div class="col-md-12">--}}
                                    {{--<div class="dec-block">--}}
                                        {{--<div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00AAAA; border-radius: 50%;" >--}}
                                            {{--<i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>--}}
                                        {{--</div>--}}
                                        {{--<div class="dec-block-dec" style="float:left;">--}}
                                            {{--<h5 style="margin-bottom: 0px;">Total Found</h5>--}}
                                            {{--<p>{{ $sessions->count() }}</p>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>
                            <div class="row">
                                <div>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</button>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Academic Year Name</th>
                                    <th>Duration</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sessions ?? ''  as $session)
                                    <tr>
                                        <td>{{$session->id}}</td>
                                        <td>{{$session->year}}</td>
                                        <td>{{$session->start}} - {{ $session->end }}</td>
                                        <td>{{$session->description}}</td>
                                        <td>
                                            {{ Form::model($session,['action'=>['InstitutionController@sessionStatus',$session->id],'method'=>'patch','onsubmit'=>'return statusChange()']) }}
                                            @if($session->active == 0)
                                                <button class="btn btn-danger btn-sm">Inactive</button>
                                            @else
                                                <button class="btn btn-success btn-sm">Active</button>
                                            @endif
                                            {{ Form::close() }}
                                        </td>
                                        <td>
                                            {{ Form::open(['action'=>['InstitutionController@delete_session',$session->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                            <a type="button" class="btn btn-warning btn-sm edit_session" value='{{$session->id}}'
                                               style="margin-left: 10px;"> <i class="fas fa-edit"></i>
                                            </a>

                                            {{--<a type="button" href="{{action('InstitutionController@delete_session', $session->id)}}"--}}
                                            {{--class="btn btn-danger btn-sm delete_session"--}}
                                            {{--style="margin-left: 10px;"> <i class="fas fa-trash"></i> Delete--}}
                                            {{--</a>--}}
                                            <button type="submit" class="btn btn-danger btn-sm" disabled=""><i class="fas fa-trash"></i></button>
                                            {{ Form::close() }}
                                        </td>
                                    </tr>web
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***/ Pop Up Model for button -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Academic Year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>'institution/store-session', 'method'=>'post']) !!}
                    <div class="form-group row">
                        {!!  Form::label('Academic Year*', null, ['class' => 'control-label, col-sm-2', 'style'=>'font-weight: 500; text-align: right'])  !!}
                        <div class="col-sm-10">
                            <div class="input-group">
                                {!!  Form::text('year', null, array_merge(['class' => 'form-control', 'placeholder'=>'ex-2017-2019'])) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!!  Form::label('Start Date', null, ['class' => 'control-form-label, col-sm-2','style'=>'font-weight: 500; text-align: right'])  !!}
                        <div class="col-sm-10">
                            <div class="input-group">
                                {!!  Form::text('start', null, array_merge(['class' => 'form-control datePicker'])) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!!  Form::label('End Date', null, ['class' => 'control-form-label, col-sm-2','style'=>'font-weight: 500; text-align: right'])  !!}
                        <div class="col-sm-10">
                            <div class="input-group">
                                {!!  Form::text('end', null, array_merge(['class' => 'form-control datePicker'])) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!!  Form::label('Description', null, ['class' => 'control-form-label, col-sm-2','style'=>'font-weight: 500; text-align: right'])  !!}
                        <div class="col-sm-10">
                            <div class="input-group">
                                {!!  Form::textarea('description', null, array_merge(['class' => 'form-control','rows'=>'3'])) !!}
                            </div>
                        </div>
                    </div>

                    <div style="float: right">
                        <button type="submit" class="btn btn-success btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for button End-->

    {{--Edit Session Model--}}
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Academic Year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>'institution/update-session', 'method'=>'post']) !!}
                    {!! Form::hidden('session_id', null,['id'=>'session_id']) !!}
                    <div class="form-group row">
                        {!!  Form::label('Academic Year*', null, ['class' => 'control-label, col-sm-2', 'style'=>'font-weight: 500; text-align: right'])  !!}
                        <div class="col-sm-10">
                            <div class="input-group">
                                {!!  Form::text('year', null, array_merge(['class' => 'form-control', 'id'=>'year', 'placeholder'=>'ex-2017-2019'])) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!!  Form::label('Start Date', null, ['class' => 'control-form-label, col-sm-2','style'=>'font-weight: 500; text-align: right'])  !!}
                        <div class="col-sm-10">
                            <div class="input-group">
                                {!!  Form::text('start', null, array_merge(['class' => 'form-control datePicker','id'=>'start'])) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!!  Form::label('End Date', null, ['class' => 'control-form-label, col-sm-2','style'=>'font-weight: 500; text-align: right'])  !!}
                        <div class="col-sm-10">
                            <div class="input-group">
                                {!!  Form::text('end', null, array_merge(['class' => 'form-control datePicker','id'=>'end'])) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!!  Form::label('Description', null, ['class' => 'control-form-label, col-sm-2','style'=>'font-weight: 500; text-align: right'])  !!}
                        <div class="col-sm-10">
                            <div class="input-group">
                                {!!  Form::textarea('description', null, array_merge(['class' => 'form-control','id'=>'description','rows'=>'3'])) !!}
                            </div>
                        </div>
                    </div>

                    <div style="float: right">
                        <button type="submit" class="btn btn-success btn-sm" > <i class="fas fa-plus-circle"></i> Update </button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    {{--Edit Session Model--}}
@stop

<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">
@stop

<!-- *** External JS File-->
@section('plugin')
    <script src= "{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
@stop

@section('script')
    <script>

        $(document).on('click', '.edit_session', function () {
            $("#edit").modal("show");
            var session_id = $(this).attr('value');

            $.ajax({
                method:"post",
                url:"{{ url('institution/edit-session')}}",
                data:{session_id:session_id,"_token":"{{ csrf_token() }}"},
                dataType:"json",
                success:function(response){
                    console.log(response);
                    $("#session_id").val(response.id);
                    $("#year").val(response.year);
                    $("#start").val(response.start);
                    $("#end").val(response.end);
                    $("#description").val(response.description);
                },
                error:function(err){
                    console.log(err);
                }
            });
        });

        // datePicker
        $(document).ready(function() {
            $('.datePicker')
                .datepicker({
                    format: 'yyyy-mm-dd'
                })
        });

        function statusChange(){
            var x = confirm('Are you sure, you want to change status?');
            return !!x;
        }

    </script>
@stop
