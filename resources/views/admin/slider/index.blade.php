@extends('layouts.fixed')

@section('title','Settings | Slider')

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
                        <li class="breadcrumb-item active">Slider</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- ***/Slider page inner Content Start-->
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
                            <h4 class="modal-title" id="exampleModalLabel" style="padding: 20px">Add Slider</h4>
                            {{--<form>--}}
                            {{ Form::open(['action'=>'SliderController@store','method'=>'post','files'=>'true']) }}
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Title*</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        {{--<input type="text" class="form-control" id=""  aria-describedby="">--}}
                                        {{ Form::text('title',null,['class'=>'form-control']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Short Description*</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        {{--<textarea type="text" class="form-control" rows="5" id=""> </textarea>--}}
                                        {{ Form::textarea('description',null,['class'=>'form-control','rows'=>5]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Start Date</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        {{--<input name="start" class="form-control" id="datePicker"  aria-describedby="">--}}
                                        {{ Form::text('start',null,['class'=>'form-control datePicker']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">End Date</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        {{--<input name="end" class="form-control" id="datePicker1"  aria-describedby="">--}}
                                        {{ Form::text('end',null,['class'=>'form-control datePicker']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Upload Image*</label>
                                <div class="col-sm-8">
                                    <div class="form-group files color">
                                        <input type="file" name="image" class="form-control" multiple="">
                                    </div>
                                    <small class="text-danger">For better view resize all images to 1920*800 pixel. For a quick help click on the link <a href="https://imageresizer.com/" target="_blank">https://imageresizer.com/</a></small>
                                </div>
                            </div>
                            <div style="float: right;padding-bottom: 50px">
                                <button type="submit" class="btn btn-success" > <i class="fas fa-plus-circle"></i> Submit</button>
                            </div>
                            {{--</form>--}}
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
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Duration</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td>{{ $slider->start }}<br>{{ $slider->end }}</td>
                                    <td>
                                        <img src="{{ asset('assets/img/sliders') }}/{{ $slider->image }}" width="100" alt="">
                                    </td>
                                    <td>
                                        {{ Form::open(['action'=>['SliderController@destroy',$slider->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
<!-- /Slider page inner Content End***-->

<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">
@stop

<!-- *** External JS File-->
@section('plugin')
    <script src= "{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
@stop


@section('script')
    <script>
        $(document).ready(function() {
            $('.datePicker')
                .datepicker({
                    format: 'yyyy-mm-dd'
                })
        });

        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this slider image?');
            return !!x;
        }
    </script>
@stop
