@extends('layouts.fixed')

@section('title','Student Merit List')

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
                        <li class="breadcrumb-item active">Students Merit</li>
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
                        {{ Form::open(['action'=>'AdmissionController@browseMeritList','role'=>'form','method'=>'get']) }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">SSC Roll</label>
                                    <div class="input-group">
                                        {{ Form::text('ssc_roll',null,['class'=>'form-control','placeholder'=>'Enter SSC Roll']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Name</label>
                                    <div class="input-group">
                                        {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Group</label>
                                    <div class="input-group">
                                        {{ Form::select('group_id',$repository->groups(),null,['class'=>'form-control','placeholder'=>'Select Group']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Status</label>
                                    <div class="input-group">
                                        {{ Form::select('status',[0=>'Not Submitted',1=>'Submitted',2=>'Approved'],null,['class'=>'form-control','placeholder'=>'Select Option']) }}
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
                        <h3 class="card-title">Found : {{ $students->total() }} | Total Submitted : {{ $applied }} | Total Approved : {{ $approved }}</h3>
                        <div class="card-tools">
{{--                            <a href="{{ route('student.add') }}" class="btn btn-success btn-sm" style="padding-top: 5px; margin-left: 60px;"><i class="fas fa-plus-circle"></i> New</a>--}}
{{--                            <a href="{{ \Illuminate\Support\Facades\Request::fullUrlWithQuery(['csv' => 'csv']) }}" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-cloud-download-alt"></i> CSV</a>--}}
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>SSC Roll</th>
                                <th>Student</th>
                                <th>Board (Passing Year)</th>
                                <th>Class</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->ssc_roll }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->board }} ({{ $student->passing_year }})</td>
                                    <td>
                                        {{ $student->session->year ?? '' }}
                                        {{ $student->class->name ?? ''}}
                                    </td>
                                    <td>
                                        @php
                                            $stdnt = \App\AppliedStudent::query()->where('ssc_roll',$student->ssc_roll)->first()
                                        @endphp
                                        @if($stdnt)
                                            @if($stdnt->approved == 1)
                                                <span class="text-success">Approved</span>
                                            @else
                                                <span class="text-warning">Submitted</span>
                                            @endif
                                        @else
                                            <span class="text-danger">Not Submitted</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($stdnt)
                                        {{ Form::open(['action'=>['AdmissionController@unapprove',$student->ssc_roll],'method'=>'post','onsubmit'=>'return confirmUnApprove()']) }}
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#studentModal" onclick="studentView({{$student->ssc_roll}})" title="Approve"><span class="fas fa-eye"></span></button>

                                            <button type="submit" class="btn btn-danger btn-sm" title="Disapprove"><span class="fas fa-ban"></span></button>
                                            {{ Form::close() }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        {{ $students->appends(Request::except('page'))->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true" style="z-index: 1100">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                {{ Form::open(['action'=>'AdmissionController@store']) }}
                <div class="modal-header">
                    <h5 class="modal-title" id="studentModalLabel">Applied Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="applied-student-view">
                    <!-- Body will be here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Approve</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        function slipView(id){
            var csrf = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ action('AdmissionController@slipView') }}",
                data:{id:id,_token:csrf},
                type: 'post'
            }).done(function(e){
                $("#modal-body").html(e);
            })
        }
    </script>
    <script>
        function studentView(roll){
            var csrf = "{{ csrf_token() }}";
            $("#loader").show()
            $.ajax({
                url: "{{ action('AppliedStudentController@studentView') }}",
                data:{roll:roll,_token:csrf},
                type: 'post'
            }).done(function(e){
                $("#applied-student-view").html(e);
                $("#loader").hide();
            })
        }
    </script>
    <script>
        function confirmUnApprove(){
            var x = confirm('Are you sure you want to disapprove this student?');
            return !!x;
        }
    </script>
@stop
