@extends('layouts.fixed')

@section('title','Staff | Edit')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Staff</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Staffs</a></li>
                        <li class="breadcrumb-item active">Edit Staffs</li>
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
                        @if($errors->any())
                            <ul style="color:red">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***/teacher page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <section id="tabs">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                        <br>
                                        <p>Staff Information</p>
                                    </a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <br>
                                        <p>Staff Address</p>
                                    </a>
                                </div>
                            </nav>
                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    {!! Form::model($info,['action'=>['StaffController@update_staff',$info->id], 'method' => 'PATCH', 'files'=>true]) !!}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table id="example2" class="table table-bordered" style="margin: 10px;">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        <h3 class="card-title"> Institution Related Information </h3>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="card-body">
                                                            <div class="form-group row col-md-12">
                                                                <label for="inputEmail4">Card ID</label>
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-envelope" aria-hidden="true"></i></span>
                                                                    </div>
                                                                    <input id="text" name="card_id" class="form-control" aria-describedby="" value="{{$info->card_id ?? ''}}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row col-md-12">
                                                                <label for="inputEmail4">Email</label>
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-envelope" aria-hidden="true"></i></span>
                                                                    </div>
                                                                    <input id="email" name="mail" class="form-control" aria-describedby="" value="{{$info->mail ?? ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="">Code</label>
                                                                    <input type="text" name="code" class="form-control" id="" placeholder="" required value="{{$info->code ?? ''}}">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="">Job Title</label>
                                                                    <input type="text" name="title" class="form-control" id="" placeholder="" required value="{{$info->title ?? ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Role </label>
                                                                        <div class="input-group">
                                                                            {!! Form::select('role_id', ['1'=>'Admin', '2'=>'User'], $info->role_id ?? null, ['class'=>'form-control']) !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Job Type</label>
                                                                        <div class="input-group">
                                                                            {!! Form::select('job_type_id', ['1'=>'Temporary', '2'=>'Permanent'], $info->job_type_id ?? null, ['class'=>'form-control']) !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Staff type*</label>
                                                                        <div class="input-group">
                                                                            {!! Form::select('staff_type_id', ['1'=>'Staff', '2'=>'Teacher'], $info->staff_type_id ?? null, ['class'=>'form-control']) !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Joining Date</label>
                                                                        <div class="input-group">
                                                                            {{Form::text('joining', $info->joining ?? null,['class'=>'form-control datePicker'])}}
                                                                            <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="inputGroupPrepend2">
                                                                                <i class="far fa-calendar-alt"></i>
                                                                            </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Salary</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="inputGroupPrepend2">
                                                                                <i class="fa fa-money nav-icon"></i> Tk
                                                                            </span>
                                                                            </div>
                                                                            <input id="" name="salary" class="form-control" aria-describedby="" value="{{$info->salary ?? ''}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Bonus</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-money nav-icon"></i> Tk </span>
                                                                            </div>
                                                                            <input id="" name="bonus" class="form-control" aria-describedby="" value="{{$info->bonus ?? ''}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-md-6">
                                            <table id="example2" class="table table-bordered" style="margin: 10px;">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        <h3 class="card-title"> General Information </h3>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="card-body">
                                                            <div class="form-group row col-md-12">
                                                                <label for="inputEmail4">Name*</label>
                                                                <div class="input-group ">
                                                                    <input id="" name="name" class="form-control" aria-describedby="" required value="{{$info->name ?? ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="">Father/Husband's Name</label>
                                                                    <input type="text" name="father_husband" class="form-control" id="" placeholder="" value="{{$info->father_husband ?? ''}}">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Mobile</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-phone"></i></span>
                                                                            </div>
                                                                            <input id="mobile" name="mobile" class="form-control" aria-describedby="" required value="{{$info->mobile ?? ''}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Date Of Birth</label>
                                                                        <div class="input-group">
                                                                            {{--<input id="" type="text" class="form-control datePicker" aria-describedby="">--}}
                                                                            {{Form::text('dob',  $info->dob ?? null, ['class'=>'form-control datePicker'])}}
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="">National ID</label>
                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Gender </label>
                                                                        <div class="input-group">
                                                                            {!! Form::select('gender_id', $genders,  $info->gender_id ?? '', ['class'=>'form-control', 'required']) !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Blood Group</label>
                                                                        <div class="input-group">
                                                                            {!! Form::select('blood_group_id', $blood_groups,  $info->blood_group_id ?? '', ['class'=>'form-control']) !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="inputEmail4">Add File</label>
                                                                <div class="form-group files color">
                                                                    <input type="file" name="image" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> content </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/editor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">

@stop

<!-- *** External JS File-->
@section('plugin')
    <script src= "{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
@stop

@section('script')
    <script>
        $(document).ready(function() {
            $('.datePicker')
                .datepicker({
                    format: 'yyyy-mm-dd'
                })
        });
    </script>
@stop
