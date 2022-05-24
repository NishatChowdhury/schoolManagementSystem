@extends('layouts.fixed')

@section('title','Student List')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Student</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Students</li>
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
                        {{ Form::open(['action'=>'StudentController@promotion','role'=>'form','method'=>'get']) }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Student ID</label>
                                    <div class="input-group">
                                        {{ Form::text('studentId',null,['class'=>'form-control','placeholder'=>'Student ID']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Session</label>
                                    <div class="input-group">
                                        {{ Form::select('session_id',$repository->sessions(),null,['class'=>'form-control','placeholder'=>'Select Session','required']) }}
                                    </div>
                                </div>
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
                        <h3 class="card-title"><span style="padding-right: 10px;"><i class="fas fa-user-graduate" style="border-radius: 50%; padding: 15px; background: #3d807a;"></i></span>Total Found : {{ $students->count() }}</h3>
                        {{--<div class="card-tools">--}}
                            {{--<a href="{{route('student.add')}}" class="btn btn-success btn-sm" style="padding-top: 5px; margin-left: 60px;"><i class="fas fa-plus-circle"></i> New</a>--}}
                            {{--<a href="" class="btn btn-primary btn-sm"><i class="fas fa-cloud-download-alt"></i> CSV</a>--}}
                        {{--</div>--}}
                    </div>
                    <!-- /.card-header -->
                    {{ Form::open(['action'=>'StudentController@promote','method'=>'post','onsubmit'=>'return confirmPromotion()']) }}
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>{{ Form::checkbox('checkall',null,true,['id'=>'checkall']) }}</th>
                                <th>Id</th>
                                <th>Old Rank</th>
                                <th>New Rank</th>
                                <th>Student</th>
                                <th>Class</th>
                                <th>Father</th>
                                <th>Mother</th>
                                <th>Image</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <th>
                                        {{ Form::checkbox('ids[]',$student->id,true,['class'=>'checkbox']) }}
                                    </th>
                                    <td>{{ $student->studentId }}</td>
                                    <td>{{ $student->rank }}</td>
                                    <td>{{ Form::text('rank['.$student->id.']',null,['class'=>'form-control']) }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>
                                    {{ $student->academicClass ? $student->academicClass->name : ''}}
                                    {{ $student->section ? $student->section->name : ''}}
                                    {{ $student->group ? $student->group->name : ''}}

                                    </td>
                                    <td>{{ $student->father }}</td>
                                    <td>{{ $student->mother }}</td>
                                    <td><img src="{{ asset('assets/img/students/') }}/{{ $student->image }}" height="100" alt=""></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
{{--                        {{ $students->appends(Request::except('page'))->links() }}--}}
                        <div class="row">
                            <div class="col">
                                <label for="">Session</label>
                                <div class="input-group">
                                    {{ Form::select('session_id',$repository->activeSessions(),null,['class'=>'form-control','placeholder'=>'Select Class','required']) }}
                                </div>
                            </div>
                            <div class="col">
                                <label for="">Class</label>
                                <div class="input-group">
                                    {{ Form::select('class_id',$repository->classes(),null,['class'=>'form-control','placeholder'=>'Select Class','required']) }}
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
                            {{ Form::submit('Promote',['class'=>'btn btn-success']) }}
                        </div>
                    </div>
                    {{ Form::close() }}
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
        function confirmPromotion(){
            var x = confirm('Are you sure, you want to promote these students?');
            return !!x;
        }

        $("#checkall").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@stop
