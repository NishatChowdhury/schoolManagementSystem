@extends('layouts.fixed')

@section('title','Employee Management')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Leaves</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                            <h3 class="card-title">Manage Employee Leave</h3>
                            <a href="{{ route('leaveManagement.add') }}" class="btn btn-success btn-sm" style="padding-top: 5px; margin-left: 60px;"><i class="fas fa-plus-circle"></i> Add Employee Leave</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Id</th>
                                <th>Purpose</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allData as $key => $value)
                                <tr class="{{$value->id}}">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $value->student_id }}</td>
                                    <td>{{ $value->start_date }}</td>
                                    <td>{{ $value->end_date }}</td>
                                    <td>{{ $value->leave_purpose }}</td>
                                    <td>
                                        <a href="{{ action('LeaveManagementController@edit',$value->id) }}" role="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
{{--                    <div class="card-body">--}}
{{--                        {{ $value->appends(Request::except('page'))->links() }}--}}
{{--                    </div>--}}
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

