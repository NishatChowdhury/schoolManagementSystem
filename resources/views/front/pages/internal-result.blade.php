@extends('layouts.front-inner')

@section('title','Internal Result')

@section('content')

    <div class="py-5 bg-dark no-print">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>Internal Examination</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Elements</a>
                        </li>
                        <li class="breadcrumb-item">
                            About us
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Panel Start -->
    <section class="padding-y-100 border-bottom no-print">
        <div class="container">

            {{ Form::open(['action'=>'FrontController@internal_exam','method'=>'get']) }}
            <div class="row align-items-center">

                <div class="col-md-3">
                    <div class="input-group mb-3">
                        {{ Form::select('session_id',$repository->sessions(),null,['class'=>'chosen-select ec-select my_select_box','placeholder'=>'Select Session','required']) }}
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="input-group mb-3">
                        {{ Form::select('exam_id',$repository->exams(),null,['class'=>'chosen-select ec-select my_select_box','placeholder'=>'Select Exam','required']) }}
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="input-group">
                        <div class="form-group">
                            {{ Form::text('student',null,['class'=>'form-control','placeholder'=>'Student ID','required']) }}
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="input-group">
                        <div class="form-group">
                            {{ Form::submit('Search',['class'=>'btn btn-success']) }}
                        </div>
                    </div>
                </div>
            </div> <!-- END row-->
            {{ Form::close() }}

        </div> <!-- END container-->
    </section>
    <!-- Search Panel End -->

    <section class="padding-y-100 border-bottom border-light">
        <div class="container">
            <div class="row" style="background: aliceblue;">
                <div class="col-lg-10 mx-auto">
                    <div class="my-4 text-center">
                        @if(Session::has('msg'))
                            <p><b>{{ Session::get('msg') }}</b></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    @unless($result == null)
        <!-- Student Details Start -->
        <section class="padding-y-100 border-bottom border-light">
            <div class="container">
                <div class="row" style="background: aliceblue;">
                    <div class="col-lg-10 mx-auto">
                        <div class="my-4 text-center">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}" width="100" alt="">
                                </div>
                                <div class="col-md-10">
                                    <h1>{{ siteConfig('name') }}</h1>
                                    <h5>{{ siteConfig('address') }}</h5>
                                    <h4>{{ $result->exam->name }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<div class="col-12 mb-5 text-center">--}}
                    {{--<h4>Table - <span class="text-primary">02</span></h4>--}}
                    {{--</div>--}}
                    <div class="col-lg-10 mx-auto">
                        <div class="table-responsive my-4">
                            <table class="table table-sm">
                                <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>:</td>
                                    <td>{{ $result->student->name ?? '' }}</td>
                                    <td>Grade</td>
                                    <td>:</td>
                                    <td>{{ $result->grade }}</td>
                                </tr>
                                <tr>
                                    <th>StudentId</th>
                                    <td>:</td>
                                    <td>{{ $result->student->studentId ?? '' }}</td>
                                    <td>Grade Point</td>
                                    <td>:</td>
                                    <td>{{ $result->gpa }}</td>
                                </tr>
                                <tr>
                                    <th>Class</th>
                                    <td>:</td>
                                    <td>{{ $result->classes->name ?? '' }} - {{ $result->student->section->name ?? '' }}{{ $result->student->group->name ?? '' }}</td>
                                    <td>Current Rank</td>
                                    <td>:</td>
                                    <td>{{ $result->student->rank ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>Total Mark</th>
                                    <td>:</td>
                                    <td>{{ $result->total_mark }}</td>
                                    <td>Result Rank</td>
                                    <td>:</td>
                                    <td>{{ $result->rank }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{--</div> <!-- END row-->--}}
                    {{--</div> <!-- END container-->--}}
                    {{--</section> <!-- END section-->--}}
                <!-- Student Details End -->

                    <!-- Marks Start -->
                    {{--<section class="padding-y-100 border-bottom border-light">--}}
                    {{--<div class="container">--}}
                    {{--<div class="row">--}}
                    {{--<div class="col-12 mb-5 text-center">--}}
                    {{--<h4>Table - <span class="text-primary">01</span></h4>--}}
                    {{--</div>--}}
                    <div class="col-lg-10 mx-auto">
                        <div class="table-responsive my-4">
                            <table class="table table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th scope="col" class="font-weight-semiBold">Subject</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Exam Mark</th>
                                    <th scope="col">Result Mark</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">GPA</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($marks as $mark)
                                    <tr>
                                        <th>{{ $mark->subject->name }}</th>
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
                                            {{--<hr>--}}
                                            {{--<span style="font-weight:bold">Total: {{ $mark->objective + $mark->written + $mark->practical + $mark->viva }}</span>--}}
                                        </td>
                                        <td>{{ $mark->grade }}</td>
                                        <td>{{ $mark->gpa }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- END row-->
            </div> <!-- END container-->
            <div class="text-center no-print">
                <a href="javascript:window.print()">Click here to print this result</a>
            </div>
        </section> <!-- END section-->
        <!-- Marks end -->
    @endunless


@stop
