@extends('layouts.fixed')

@section('title','Settings | Site Basic Info')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Site Basic Information</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Site Basic Info</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- ***Site info Inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <h5>Site Information</h5>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if($errors->any())
                                <ul class="text-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="card-body">
                            {{ Form::model($info,['action'=>'SiteInformationController@update','method'=>'patch']) }}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">Title</label>
                                    {{ Form::text('title',null,['class'=>'form-control']) }}
                                </div>
                                {{--                                <div class="form-group col-md-6">--}}
                                {{--                                    <label for="name">Name</label>--}}
                                {{--                                    {{ Form::text('name',null,['class'=>'form-control']) }}--}}
                                {{--                                </div>--}}
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    {{ Form::text('name',null,['class'=>'form-control']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Name Font</label>
                                    {{ Form::text('name_font',null,['class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">Name Size</label>
                                    {{ Form::text('name_size',null,['class'=>'form-control']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Name Color</label>
                                    <div class="input-group my-colorpicker2">
                                        {{ Form::text('name_color',null,['class'=>'form-control']) }}
                                        <div class="input-group-append input-group-addon">
                                            <span class="input-group-text">
                                                <i></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">বাংলা নাম</label>
                                    {{ Form::text('bn',null,['class'=>'form-control']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">বাংলা নাম  ফন্ট</label>
                                    {{ Form::text('bn_font',null,['class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">বাংলা নাম  সাইজ</label>
                                    {{ Form::text('bn_size',null,['class'=>'form-control']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">বাংলা নাম  রঙ</label>
                                    <div class="input-group my-colorpicker2">
                                        {{ Form::text('bn_color',null,['class'=>'form-control my-colorpicker1']) }}
                                        <div class="input-group-append input-group-addon">
                                            <span class="input-group-text">
                                                <i></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                {{ Form::text('address',null,['class'=>'form-control']) }}
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Institution Code</label>
                                    {{ Form::text('institute_code',null,['class'=>'form-control']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="eiinNo">EIIN No</label>
                                    {{ Form::text('eiin',null,['class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">Phone</label>
                                    {{ Form::text('phone',null,['class'=>'form-control']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    {{ Form::text('email',null,['class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group text-center">
                                {{ Form::submit('SAVE',['class'=>'btn btn-success']) }}
                                {{ Form::reset('RESET',['class'=>'btn btn-warning']) }}
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <h5>Site Logo</h5>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{ Form::model($info,['action'=>'SiteInformationController@logo','method'=>'patch','files'=>true]) }}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">Logo Height</label>
                                    {{ Form::text('logo_height',null,['class'=>'form-control','placeholder'=>'Logo Height']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Logo Text Bottom</label>
                                    <input type="text" class="form-control" id="" placeholder="type..">
                                </div>
                            </div>
                            <div class="form-group files color">
                                <input type="file" class="form-control" multiple="" name="logo">
                            </div>
                            <div class="form-row">
                                {{ Form::submit('SAVE',['class'=>'btn btn-success']) }}
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                    <div class="card mt-2">
                        {{ Form::model($info,['action'=>'SiteInformationController@update_google_map','method'=>'patch']) }}
                        <div class="card-header">
                            <h5>Google Map</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Google Map Embed Code: </label>
                                {{ Form::textarea('map',null,['class'=>'form-control','placeholder'=>'Paste Google Map Embed Code Here:','rows'=>'4', 'cols'=>'100']) }}
                            </div>
                            <div class="form-row">
                                {{ Form::submit('UPDATE',['class'=>'btn btn-success']) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>

                </div>
            </div>
            {{--<div style="float: right">--}}
            {{--<button type="button" class="btn btn-success"> <i class="far fa-save"></i> Save</button>--}}
            {{--</div>--}}
        </div>
    </section>

@stop
<!--Site info Inner Content End***-->

@section('plugin-css')
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/colorpicker/bootstrap-colorpicker.min.css') }}">
@stop

@section('plugin')
    <!-- bootstrap color picker -->
    <script src="{{ asset('plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
@stop
<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
@stop

@section('script')
    <script>
        //Colorpicker
        $('.my-colorpicker1').colorpicker();
        $('.my-colorpicker2').colorpicker();
    </script>
@stop
