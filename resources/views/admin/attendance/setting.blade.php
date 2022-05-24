@extends('layouts.fixed')

@section('title','Attendance | Setting')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Attendance Setting </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Attendance Setting</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.Search-panel -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="col-md-12">
                            <div class="card" style="margin: 10px;">
                                <div class="card-header">
                                    <h3 class="card-title">Quick  Search</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form">
                                    <div class="card-body">
                                        <div class="form-group row col-md-12">
                                            <div class="input-group ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-search" aria-hidden="true"></i></span>
                                                </div>
                                                <input id="" type="search" name="search" class="form-control" aria-describedby="">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Search-panel -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <h3 class="card-title"><span style="padding-right: 10px;margin-left: 10px;"><i class="fas fa-user-graduate" style="border-radius: 50%; padding: 15px; background: #3d807a;"></i></span>Total Found : 1000</h3>
                            </div>
                            <div class="row">
                                <div>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Entry</th>
                                    <th>Exit</th>
                                    <th>Grace</th>
                                    <th>Late Fee</th>
                                    <th>Absent Fee</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($shifts as $shift)
                                    <tr>
                                        <td>{{ $shift->id }}</td>
                                        <td>{{ $shift->name }}</td>
                                        <td>{{ $shift->start }}</td>
                                        <td>{{ $shift->end }}</td>
                                        <td>{{ $shift->grace }}</td>
                                        <td>{{ $shift->late_fee }}</td>
                                        <td>{{ $shift->absent_fee }}</td>
                                        <td>
                                            {{ Form::open(['action'=>['ShiftController@destroy',$shift->id],'method'=>'delete','onsubmit'=>'return deleteConfirm()']) }}
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***/Attendance setting add new form -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Attendance Setting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['action'=>'ShiftController@store','method'=>'post']) }}
                <div class="modal-body">
                    {{--<form>--}}
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Name*</label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" name="name" class="form-control" id=""  aria-describedby="" >
                                {{--<div class="input-group-prepend">--}}
                                {{--<span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-clock nav-icon"></i></span>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Start Time*</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="start" class="form-control" aria-describedby="" placeholder="hh:mm:ss">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"><i class="fa fa-clock nav-icon"></i> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">End Time*</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="end" class="form-control" aria-describedby="" placeholder="hh:mm:ss">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-clock nav-icon"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Grace Time*</label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" name="grace" class="form-control">
                                {{--<div class="input-group-prepend">--}}
                                {{--<span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-clock nav-icon"></i></span>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Late Present Fee*</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">Tk</span>
                                </div>
                                <input type="text" name="late_fee" class="form-control" id="" placeholder="0"  aria-describedby="" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Absent Fee*</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">Tk</span>
                                </div>
                                <input type="text" name="absent_fee" class="form-control" id="" placeholder="0"  aria-describedby="" >
                            </div>
                        </div>
                    </div>
                    {{--<div class="form-group row">--}}
                    {{--<label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Exit Attendance Start Time*</label>--}}
                    {{--<div class="col-sm-9">--}}
                    {{--<div class="input-group">--}}
                    {{--<input type="text" class="form-control" id=""  aria-describedby="" >--}}
                    {{--<div class="input-group-prepend">--}}
                    {{--<span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-clock nav-icon"></i></span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row">--}}
                    {{--<label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Exit Attendance End Time*</label>--}}
                    {{--<div class="col-sm-9">--}}
                    {{--<div class="input-group">--}}
                    {{--<input type="text" class="form-control" id=""  aria-describedby="" >--}}
                    {{--<div class="input-group-prepend">--}}
                    {{--<span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-clock nav-icon"></i></span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row">--}}
                    {{--<label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Process*</label>--}}
                    {{--<div class="col-sm-9">--}}
                    {{--<div class="input-group">--}}
                    {{--<select id="inputState" class="form-control">--}}
                    {{--<option selected>Choose...</option>--}}
                    {{--<option>...</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row">--}}
                    {{--<label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Notification*</label>--}}
                    {{--<div class="col-sm-9">--}}
                    {{--<div class="input-group">--}}
                    {{--<select id="inputState" class="form-control">--}}
                    {{--<option selected>Choose...</option>--}}
                    {{--<option>...</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row">--}}
                    {{--<label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Shift*</label>--}}
                    {{--<div class="col-sm-9">--}}
                    {{--<div class="input-group">--}}
                    {{--<select id="inputState" class="form-control">--}}
                    {{--<option selected>Choose...</option>--}}
                    {{--<option>...</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row">--}}
                    {{--<label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">User*</label>--}}
                    {{--<div class="col-sm-9">--}}
                    {{--<div class="input-group">--}}
                    {{--<select id="inputState" class="form-control">--}}
                    {{--<option selected>Choose...</option>--}}
                    {{--<option>...</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</form>--}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <!-- /Attendance setting add new form End*** -->
@stop

@section('script')
    <script>
        function deleteConfirm() {
            var x = confirm('Are you sure you wan to delete this shift?');
            return !!x;
        }
    </script>
@stop
