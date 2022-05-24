@extends('layouts.fixed')

@section('title','Settings | Important Links')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Slider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Important Links</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="container">
                            <h4 class="modal-title" id="exampleModalLabel" style="padding: 20px">Add Link</h4>
                            {{ Form::open(['action'=>'LinkController@store','method'=>'post']) }}
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Title*</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        {{ Form::text('title',null,['class'=>'form-control']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Link*</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        {{ Form::text('link',null,['class'=>'form-control datePicker']) }}
                                    </div>
                                </div>
                            </div>
                            <div style="float: right;padding-bottom: 50px">
                                <button type="submit" class="btn btn-success" > <i class="fas fa-plus-circle"></i> Submit</button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="container">
                            <h4 class="modal-title" id="exampleModalLabel" style="padding: 20px">Add Slider</h4>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($links as $link)
                                    <tr>
                                        <td>{{ $link->id }}</td>
                                        <td>{{ $link->title }}</td>
                                        <td>{{ $link->link }}</td>
                                        <td>
                                            {{ Form::open(['action'=>['LinkController@destroy',$link->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            {{ Form::close() }}
                                        </td>
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
<!-- /Important Link page inner Content End***-->

@section('script')
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this slider image?');
            return !!x;
        }
    </script>
@stop
