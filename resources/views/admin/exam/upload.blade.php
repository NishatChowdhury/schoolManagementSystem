@extends('layouts.fixed')

@section('title','Exam Mark')

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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Upload Mark</li>
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
                        <div class="card-header">
                            <h1>{{ $schedule->academicClass->academicClasses->name }}&nbsp;{{ $schedule->academicClass->section->name ?? '' }}{{ $schedule->academicClass->group->name ?? '' }}</h1>
                        </div>
                        <div class="card-body">
                            {{ Form::open(['action'=>'MarkController@up','method'=>'post','files'=>true]) }}
                            {{ Form::hidden('schedule',$schedule->id) }}
                            <input type="file" name="file">
                            <button type="submit">upload</button>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
