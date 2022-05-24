@extends('layouts.fixed')

@section('title','Assign Subject')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Assign Subject</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Student</a></li>
                        <li class="breadcrumb-item active">Subject</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

{{--    <div class="content">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            {{ Form::open(['action'=>'StudentController@subjects','method']) }}--}}
{{--                            {{ Form::text('search',null,['class'=>'form-control','placeholder'=>'Search by student id']) }}--}}
{{--                            {{ Form::close() }}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- /.Search-panel -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                    <div class="col-md-4">
                        <!-- Widget: user widget style 2 -->
                        <div class="card card-widget widget-user-2">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-secondary-gradient">
                                <div class="widget-user-image">
                                    <img class="img-circle elevation-2" src="{{ asset('assets/img/students/') }}/{{ $student->image }}" alt="{{ $student->studentId }}">
                                </div>
                                <!-- /.widget-user-image -->
                                <h3 class="widget-user-username">{{ $student->name }}</h3>
                                <h5 class="widget-user-desc">{{ $student->studentId }}</h5>
                            </div>
                            <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item text-center p-2">
                                            <label class="text-center">{{ $student->classes->name ?? 'undefined' }} {{ $student->group->name ?? '' }} {{ $student->section->name ?? '' }}</label>
                                    </li>
                                    <li class="nav-item p-2">
                                        <label>Rank </label><span class="float-right badge bg-info">{{ $student->rank }}</span>
                                    </li>
                                    <li class="nav-item p-2">
                                        <label>Phone </label><span class="float-right badge bg-warning">{{ $student->mobile }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>
                    <!-- /.col -->

                <div class="col-md-8">
                    <div class="card" style="margin: 10px;">
                        <div class="card-body">
                            {{ Form::open(['action'=>['StudentController@assignSubject',$student->id],'method'=>'patch']) }}
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 class="text-center" style="border-bottom:1px solid #DDDDDD"><label for="">Compulsory</label></h6>
                                    <!-- checkbox -->
                                    @foreach($compulsory as $com)
                                        <div class="form-group">
                                            <label>
                                                <input name="subjects[compulsory][]" value="{{ $com->id }}" type="checkbox" class="flat-red" {{ in_array($com->id,$subjects->compulsory ?? []) ? 'checked' : '' }}>
                                                {{ $com->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-4">
                                    <h6 class="text-center" style="border-bottom:1px solid #DDDDDD"><label for="">Selective</label></h6>
                                    <!-- checkbox -->
                                    @foreach($selective as $sel)
                                        <div class="form-group">
                                            <label>
                                                <input name="subjects[selective][]" value="{{ $sel->id }}" type="checkbox" class="flat-red" {{ in_array($sel->id,$subjects->selective ?? []) ? 'checked' : '' }}>
                                                {{ $sel->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-4">
                                    <h6 class="text-center" style="border-bottom:1px solid #DDDDDD"><label for="">Optional</label></h6>
                                    <!-- checkbox -->
                                    @foreach($optional as $opt)
                                        <div class="form-group">
                                            <label>
                                                <input name="subjects[optional][]" value="{{ $opt->id }}" type="checkbox" class="flat-red" {{ in_array($opt->id,$subjects->optional ?? []) ? 'checked' : '' }}>
                                                {{ $opt->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success">Save Change</button>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(Session::has('success'))
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <label>{{ Session::get('success') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@stop
