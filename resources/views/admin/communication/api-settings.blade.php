@extends('layouts.fixed')

@section('title','Edit API')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Api</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Api</li>
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
                                    {{ Form::model($apiData ,['route'=>['apiSetting.update',$apiData->id],'method'=>'patch','enctype'=>'multipart/form-data']) }}
                                    @include('admin.communication.apiSetting.form-api-setting')
                                    {!! Form::submit('Update', ['class' => 'form-control, btn btn-success ']) !!}
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