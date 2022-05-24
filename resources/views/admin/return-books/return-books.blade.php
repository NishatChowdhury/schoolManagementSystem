@extends('layouts.fixed')

@section('title','Return Books')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Return Books</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Return Books</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-light">
                            {!!  Form::open(['action'=>'BookController@returnBookStore', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}
                            <div class="card-body">
                                <h3 style="background-color: #117a8b;color: white;margin-bottom: 10px;padding-left: 20px;padding-bottom: 10px;padding-top: 10px;">Return A Book</h3>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            {{ Form::label('student_id', 'Student ID',['class'=>'control-label' ]) }}
                                            {{ Form::select('student_id',$studentID, null, ['placeholder' => 'Select Student ID','class'=>'form-control select2']) }}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            {{ Form::label('book_id', 'Book ID',['class'=>'control-label' ]) }}
                                            {{ Form::select('book_id',$bookCode, null, ['placeholder' => 'Select Book ID','class'=>'form-control']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Submit', ['class' => 'form-control, btn btn-success ']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}

                    <!-- /.card -->
                    </div>
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-body">
                            <h3 style="background-color: #117a8b;color: white;margin-bottom: 10px;padding-left: 20px;padding-bottom: 10px;padding-top: 10px;">List Of All Issued Books:</h3>
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead class="thead-dark">
                                <tr>
                                    <th>#SL</th>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Book ID</th>
                                    <th>Issue Quantity</th>
                                    <th>Issue Date</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($issuedData as $key => $data)
                                    <tr class="{{$data->id}}">
                                        <td>{{  $key+1 }}</td>
                                        <td>{{  $data->studentID->studentId }}</td>
                                        <td>{{  $data->student_name->name }}</td>
                                        <td>{{  $data->bookCode->book_code }}</td>
                                        <td>{{1}}</td>
                                        <td>{{  $data->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
    @section('script')
        <script>
            $(document).ready(function() {
            $('.select2').select2();
            });
        </script>
    @stop
@stop


