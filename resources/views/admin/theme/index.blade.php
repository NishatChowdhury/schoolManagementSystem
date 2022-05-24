@extends('layouts.fixed')

@section('title','Student List')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Student</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Students</li>
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
                        <!-- form start -->
                        {{ Form::open(['action'=>'StudentController@index','role'=>'form','method'=>'get']) }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Student ID</label>
                                    <div class="input-group">
                                        {{ Form::text('id',null,['class'=>'form-control','placeholder'=>'User ID']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Name</label>
                                    <div class="input-group">
                                        {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) }}
                                    </div>
                                </div>

                                <div class="col-1" style="padding-top: 32px;">
                                    <div class="input-group">
                                        <button  style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.Search-panel -->


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Total Found : {{ $themes->total() }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('user.add') }}" class="btn btn-success btn-sm" style="padding-top: 5px; margin-left: 60px;"><i class="fas fa-plus-circle"></i> New</a>
                            <a href="{{ \Illuminate\Support\Facades\Request::fullUrlWithQuery(['csv' => 'csv']) }}" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-cloud-download-alt"></i> CSV</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Color Palette</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($themes as $theme)
                                <tr class="{{ $theme->current ? 'text-bold' : '' }}">
                                    <td>{{ $theme->id }}</td>
                                    <td>
                                        {{ $theme->name }}
                                        @if($theme->id === 1) <i class="text-sm" style="color:lightslategray">(default)</i> @endif
                                        @if($theme->current)
                                            <i class="far fa-check-circle" style="color:lightslategray"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <span style="float:left;background: {{ $theme->top_bar_background }}">&nbsp;</span>
                                        <span style="float:left;background: {{ $theme->top_bar_color }}">&nbsp;</span>
                                        <span style="float:left;background: {{ $theme->header_background }}">&nbsp;</span>
                                        <span style="float:left;background: {{ $theme->header_color }}">&nbsp;</span>
                                        <span style="float:left;background: {{ $theme->menu_background }}">&nbsp;</span>
                                        <span style="float:left;background: {{ $theme->menu_color }}">&nbsp;</span>
                                        <span style="float:left;background: {{ $theme->submenu_background }}">&nbsp;</span>
                                        <span style="float:left;background: {{ $theme->submenu_color }}">&nbsp;</span>
                                        <span style="float:left;background: {{ $theme->inner_background }}">&nbsp;</span>
                                        <span style="float:left;background: {{ $theme->inner_color }}">&nbsp;</span>
                                        <span style="float:left;background: {{ $theme->footer_background }}">&nbsp;</span>
                                        <span style="float:left;background: {{ $theme->footer_color }}">&nbsp;</span>
                                    </td>
                                    <td>{{ $theme->created_at }}</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm"><i class="fas fa-user-check"></i></a>
                                        <a href="{{ action('ThemeController@edit',$theme->id) }}" role="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ action('ThemeController@destroy',$theme->id) }}" role="button" class="btn btn-danger btn-sm" title="Remove"><i class="fas fa-sign-out-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        {{ $themes->appends(Request::except('page'))->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@stop
