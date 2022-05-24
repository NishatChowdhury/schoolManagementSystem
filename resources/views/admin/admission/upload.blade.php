@extends('layouts.fixed')

@section('title','Admission | Examinations')


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Upload Merit List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admission</a></li>
                        <li class="breadcrumb-item active">Online</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Upload</div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            {{ Form::open(['action'=>'AdmissionController@upload','method'=>'post','files'=>true]) }}
                            <div class="form-group">
                                <div class="row">
                                    <label for="upload" class="col-sm-3">Session*:</label>
                                    <div class="col-sm-9">
                                        {{ Form::select('session_id',$sessions,null,['class'=>'form-control','placeholder'=>'Select a session','required']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="upload" class="col-sm-3">Class*:</label>
                                    <div class="col-sm-9">
                                        {{ Form::select('class_id',$classes,null,['class'=>'form-control','placeholder'=>'Select a class','required']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="upload" class="col-sm-3">Group*:</label>
                                    <div class="col-sm-9">
                                        {{ Form::select('group_id',$groups,null,['class'=>'form-control','placeholder'=>'Select a group','required']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="upload" class="col-sm-3">Browse Merit List (CSV)*:</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="list">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                {{ Form::submit('SUBMIT',['class'=>'btn btn-success']) }}
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
