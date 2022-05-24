@extends('layouts.fixed')

@section('title','Staff | Teacher')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Staffs</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Staffs</a></li>
                        <li class="breadcrumb-item active">Teacher</li>
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
                    <div class="card" style="margin: 0px;">
                        <!-- form start -->
                        <form action="">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="">Staff ID</label>
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Staff ID" name="code" type="text">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Name</label>
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Name" name="name" type="text">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Staff Type</label>
                                        <div class="input-group">
                                            {{ Form::select('staff_type_id',[1=>'teacher',2=>'staff'],null,['class'=>'form-control','placeholder'=>'Staff Type']) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Job Type</label>
                                        <div class="input-group">
                                            {{ Form::select('job_type_id',[1=>'Permanent',2=>'Temporary'],null,['class'=>'form-control']) }}
                                        </div>
                                    </div>

                                    <div class="col-1" style="padding-top: 32px;">
                                        <div class="input-group">
                                            <button style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.Search-panel -->

    <!-- ***/teacher page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="dec-block">
                                        <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00AAAA; border-radius: 50%;" >
                                            <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                        </div>
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0;">Total Found</h5>
                                            <p>{{ $staffs->count() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div>
                                    <a href="{{route('staff.addstaff')}}" type="button" class="btn btn-info btn-sm"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Job Title </th>
                                    <th>Staff Type</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 0)
                                @foreach($staffs as $staff)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>
                                        <img style="width: 40px; height: auto; border-radius: 50%; text-align: center;" src="{{asset('assets/img/staffs/'.$staff->image)}}" alt="Staff Image">
                                    </td>
                                    <td>{{$staff->code}}</td>
                                    <td>{{$staff->name}}</td>
                                    <td>{{$staff->title}}</td>
                                    <td>{{$staff->staff_type_id}}</td>
                                    <td>{{$staff->email}}</td>
                                    <td>{{$staff->mobile}}</td>
                                    <td>
                                        <a href="{{ url('staff-profile',$staff->id) }}" class="btn btn-success btn-sm" ><i class="fas fa-eye"></i> </a>
                                        <a  class="btn btn-warning btn-sm edit" href="{{action('StaffController@edit_staff', $staff->id)}}" ><i class="fas fa-edit"></i> </a>
                                        <a  href="{{url('staff/delete-staff', $staff->id)}}" class="btn btn-danger btn-sm delete"> <i class="fas fa-trash"></i> </a>
                                    </td>
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
@stop
