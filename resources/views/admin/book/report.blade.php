@extends('layouts.fixed')

@section('title','Library Book Checkout Sheet')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Library Book Checkout Sheet</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="form-group  col-md-2" style="padding-bottom:10px; margin: 30px 0 0 0;" >
                    <button class="btn btn-success" onclick="window.print(); return false;">Print</button>
                </div>
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-body">
                            <h3 style="background-color: #117a8b;color: white;margin-bottom: 10px;padding-left: 20px;padding-bottom: 10px;padding-top: 10px;"><i class="fas fa-book-open"></i> Library Book Checkout Sheet</h3>
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead class="thead-dark">
                                <tr>
                                    <th>#SL</th>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Book ID</th>
                                    <th>Date Borrowed</th>
                                    <th>Date Returned</th>
                                    <th>Total Days</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($issuedData as $key => $data)
                                    <tr class="{{$data->id}}">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->studentID->studentId }}</td>
                                        <td>{{ $data->student_name->name }}</td>
                                        <td>{{ $data->bookCode->book_code }}</td>
                                        <td>{{ $date_borrowed=$data->created_at->todatestring() }}</td>
                                        <td>{{ $date_returned=$data->created_at->todatestring() }}</td>
                                        <td>{{ $diff = abs(strtotime($date_returned) - strtotime($date_borrowed)) }}</td>
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
@stop


