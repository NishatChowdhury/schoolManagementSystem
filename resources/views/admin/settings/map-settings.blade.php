@extends('layouts.fixed')

@section('title','Add Map')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Map</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Map</li>
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
                    <!-- general form elements -->
                    {{--                    <div class="card card-light">--}}
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif

                <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    {!!  Form::open(['action'=>'MapSettingController@store', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}

                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <div class="form-group">
                                                {{ Form::label('map_id', 'Map ID:',['class'=>'control-label' ]) }}
                                                {{ Form::textarea('map_id', old('map_id'), ['placeholder' => 'Enter Map Id:','class'=>'form-control']) }}
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::submit('Save', ['class' => 'form-control, btn btn-success ']) !!}
                                    {{ Form::close() }}
                                </div>
                            </div>

                        </div>
                    </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
@stop
