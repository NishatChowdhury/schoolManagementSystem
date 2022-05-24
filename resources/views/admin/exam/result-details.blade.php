@extends('layouts.fixed')

@section('title', 'Exam Mgmt | Result Details')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Result Details</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="" class="table">
                                <tr>
                                    <th>Student's Name : </th>
                                    <td>{{ $result->student->name ?? '' }}</td>
                                    <th>Exam Name : </th>
                                    <td>{{ $result->exam->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>StudentID : </th>
                                    <td>{{ $result->student->studentId }}</td>
                                    <th>Date : </th>
                                    <td>{{ $result->exam->start }} - {{ $result->exam->end }}</td>
                                </tr>
                                <tr>
                                    <th>Class :</th>
                                    <td>{{ academicClass($result->academic_class_id) }}</td>
                                    <th>Grade : </th>
                                    <td>{{ $result->grade }}</td>
                                </tr>
                                <tr>
                                    <th>Current Rank :</th>
                                    <td>{{ $result->student->rank }}</td>
                                    <th>Grade Point :</th>
                                    <td>{{ $result->gpa }}</td>
                                </tr>
                                <tr>
                                    <th>Result Rank :</th>
                                    <td>{{ $result->rank }}</td>
                                    <th>Total Marks :</th>
                                    <td>{{ $result->total_mark }}</td>
                                </tr>
                            </table>

                            <div style="float: right;" class="no-print">
                                <a href="javascript:window.print()" role="button" class="btn btn-success btn-sm" title="PRINT"><i class="fas fa-print"></i></a>
                                <a href="#" role="button" class="btn btn-danger btn-sm" title="Download PDF"><i class="fas fa-file-pdf" aria-hidden="true"></i></a>
                            </div>

                            <table id="" class="table table-bordered" style="margin-top: 60px;">
                                <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Code</th>
                                    <th>Exam Mark</th>
                                    <th>Result Mark</th>
                                    <th>Grade</th>
                                    <th>Grade point</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($marks as $mark)
                                <tr>
                                    <td>{{ $mark->subject->name }}</td>
                                    <td>{{ $mark->subject->code }}</td>
                                    <td>{{ $mark->full_mark }}</td>
                                    <td>
                                        @if($mark->objective > 0)
                                            Objective: {{ $mark->objective }}<br>
                                        @endif
                                        @if($mark->written > 0)
                                            Written: {{ $mark->written }}<br>
                                        @endif
                                        @if($mark->practical > 0)
                                            Practical: {{ $mark->practical }}<br>
                                        @endif
                                        @if($mark->viva > 0)
                                            Viva: {{ $mark->viva }}
                                        @endif
                                    </td>
                                    <td>{{ $mark->grade }}</td>
                                    <td>{{ $mark->gpa }}</td>
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
