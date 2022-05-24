@extends('layouts.fixed')

@section('title','Settings | Socials Links')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Social</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Social Links</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- ***/Important Link page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-danger">
                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="container">
                            <h4 class="modal-title" id="exampleModalLabel" style="padding: 20px">Add Social Link</h4>
                            {{ Form::model($socials,['action'=>['SocialController@update',1],'method'=>'post']) }}
                                <table class="table table-bordered table-striped table-dark">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Link</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ Form::text('facebook','facebook',['class'=>'form-control','readonly']) }}</td>
                                            <td>{{ Form::text('facebook',null,['class'=>'form-control']) }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ Form::text('youtube','youtube',['class'=>'form-control','readonly']) }}</td>
                                            <td>{{ Form::text('youtube',null,['class'=>'form-control']) }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ Form::text('twitter','twitter',['class'=>'form-control','readonly']) }}</td>
                                            <td>{{ Form::text('twitter',null,['class'=>'form-control']) }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ Form::text('linkendin','linkedin',['class'=>'form-control','readonly']) }}</td>
                                            <td>{{ Form::text('linkendin',null,['class'=>'form-control']) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div style="float: right;padding-bottom: 50px">
                                    <button type="submit" class="btn btn-success" > <i class="fas fa-plus-circle"></i> Submit</button>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="container">
                            <h4 class="modal-title" id="exampleModalLabel" style="padding: 20px">Social Links</h4>
                            <table class="table table-striped table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Link</th>
                                        {{--<th>Action</th>--}}
                                    </tr>
                                </thead>
                                <tbody>
                                   <tr>
                                       <td>{{ 1 }}</td>
                                       <td>Facebook</td>
                                       <td>{{ $socials->facebook }}</td>
                                   </tr>
                                   <tr>
                                       <td>{{ 2 }}</td>
                                       <td>YouTube</td>
                                       <td>{{ $socials->youtube }}</td>
                                   </tr>
                                   <tr>
                                       <td>{{ 3 }}</td>
                                       <td>Twitter</td>
                                       <td>{{ $socials->twitter }}</td>
                                   </tr>
                                   <tr>
                                       <td>{{ 4 }}</td>
                                       <td>LinkendIn</td>
                                       <td>{{ $socials->linkendin }}</td>
                                   </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

            </div>
        </div>
    </section>
@stop
<!-- /Important Link page inner Content End***-->

@section('script')
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this slider image?');
            return !!x;
        }
    </script>
@stop