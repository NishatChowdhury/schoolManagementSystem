@extends('layouts.fixed')

@section('title','Exam Seat Plan')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Examination</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Exam</a></li>
                        <li class="breadcrumb-item active">Set Plan</li>
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
                        {{ Form::open(['action'=>'ExamSeatPlanController@storeSeatPlan','role'=>'form','method'=>'post']) }}
                        <div class="card-body">
                                {{ Form::hidden('exam_id',$id) }}
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Room</label>
                                    <div class="input-group">
                                        {{ Form::text('room',null,['class'=>'form-control room','placeholder'=>'Room No','required']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Academic Class</label>
                                    <div class="input-group">
                                        <select name="academic_class_id" id="classId" class="form-control">
                                            <option > Select Class </option>
                                            @foreach($repository->academicClasses() as $class)
                                                <option value="{{ $class->id }}">{{ $class->academicClasses->name ?? '' }}&nbsp;{{ $class->group->name ?? '' }}{{ $class->section->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col">
                                    <label for="">Roll From</label>
                                    <div class="input-group">
                                        {{ Form::text('roll_form',null,['class'=>'form-control rollFrom','placeholder'=>'Roll Form']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Roll To</label>
                                    <div class="input-group">
                                        {{ Form::text('roll_to',null,['class'=>'form-control rollTo','placeholder'=>'Roll To']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Total Count</label>
                                    <div class="input-group">
                                        {{ Form::text('count',null,['class'=>'form-control count','placeholder'=>'Student Count','readonly']) }}
                                    </div>
                                </div>

                                <div class="col-1" style="padding-top: 32px;">
                                    <div class="input-group">
                                        <button  style="padding: 6px 20px;" type="submit" class="btn btn-success save">Save</button>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Exam Seat Plan </h3>
                            <div class="card-tools">
                                {{--<a href="{{ route('student.add') }}" class="btn btn-success btn-sm" style="padding-top: 5px; margin-left: 60px;"><i class="fas fa-plus-circle"></i> New</a>--}}
                                {{--<a href="{{ \Illuminate\Support\Facades\Request::fullUrlWithQuery(['csv' => 'csv']) }}" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-cloud-download-alt"></i> CSV</a>--}}
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-sm">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th>Room No</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Roll Form</th>
                                        <th>Roll To</th>
                                        <th>Count</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $seat)
                                        <tr class="text-center">
                                            <td>{{ $seat->room }}</td>
                                            <td>{{ $seat->academicClasses->academicClasses->name }}</td>
                                            <td>{{ $seat->academicClasses->section->name ?? '' }}</td>
                                            <td>{{ $seat->roll_form }}</td>
                                            <td>{{ $seat->roll_to }}</td>
                                            <td>{{ $seat->count }}</td>
                                            <td>
                                                {!! Form::open(['action'=>['ExamSeatPlanController@destroy',$seat->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) !!}
                                                <a href="{{url('exam/pdf-seat-plan',$seat->id)}}" class="btn btn-success btn-sm" title="print Set Plan"><i class="fa fa-address-card"></i></a>
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Set Plan"><i class="fa fa-trash"></i></button>
                                                {!! Form::close() !!}


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->

@stop
@section('script')
    <script>
        $(document).ready(function () {
            $('.save').hide();
            $('form').on('change',function () {
                var classId     = $('#classId').val();
                var rollFrom    = $('.rollFrom').val();
                var rollTo      = $('.rollTo').val();
                //console.log(rollTo);

                $.ajax({
                    url     :'{{ url('exam/check-roll') }}',
                    type    :'POST',
                    csrf    :'{{csrf_token()}}',
                    data    : {classId:classId,rollFrom:rollFrom,rollTo:rollTo,"_token":"{{ csrf_token() }}"},
                    success:function (data) {
                        console.log(data);
                        $('.count').val(data);
                        if($('.count').val() > 0){
                            $('.save').show();
                        }
                    }
                });


            });




        });
        function confirmDelete(){
            var x = confirm('Are you sure you want delete this Seat Plan?');
            return !!x;
        }
    </script>
@stop
