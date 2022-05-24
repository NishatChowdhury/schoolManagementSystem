@extends('layouts.fixed')

@section('title','Settings | Notices')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Notices</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Notices</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- ***/Notices page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <h3 class="card-title"><span style="padding-right: 10px;margin-left: 10px;"><i class="fas fa-book" style="border-radius: 50%; padding: 15px; background: #3d807a; color: #ffffff"></i></span>Total Found : 1000</h3>
                            </div>
                            <div class="row">
                                <div>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Short Description</th>
                                    <th>Start Date</th>
                                    <th>End Date </th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($notices as $notice)
                                    <tr>
                                        <td>{{ $notice->title }}</td>
                                        <td>{{ substr(strip_tags($notice->description),0,99) }}</td>
                                        <td>{{ $notice->start ? $notice->start->format('Y-m-d') : 'undefined' }}</td>
                                        <td>{{ $notice->end ? $notice->end->format('Y-m-d') : 'undefined' }}</td>
                                        <td>
                                            @if($notice->category)
                                                {{ $notice->category->name }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($notice->type)
                                                {{ $notice->type->name }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ Form::model($notice,['action'=>['NoticeController@destroy',$notice->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                            <a href="{{ action('NoticeController@edit',$notice->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            {{ Form::submit('X',['class'=>'btn btn-danger btn-sm']) }}
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-sm-12 col-md-9">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#">First</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Last</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***/ Pop Up Model for button Start-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Notice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open(['action'=>'NoticeController@store','method'=>'post','files'=>true]) }}
                    {{--<form>--}}
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Type*</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{ Form::select('notice_type_id',$repository->types(),null,['id'=>'inputState','class'=>'form-control','style'=>'height: 35px !important;']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Category*</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{ Form::select('notice_category_id',$repository->categories(),null,['id'=>'inputState','class'=>'form-control','style'=>'height: 35px !important;']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Title*</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{--<input type="text" class="form-control" id=""  aria-describedby="">--}}
                                {{ Form::text('title',null,['class'=>'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Short Description</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{--<textarea type="text" class="form-control" rows="5" id=""> </textarea>--}}
                                {{ Form::textarea('description',null,['class'=>'form-control','row'=>5]) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Start Date</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input name="start" class="form-control datePicker" aria-describedby="">
                                {{--{{ Form::text('start',null,['class'=>'form-control']) }}--}}
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">End Date</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input name="end" class="form-control datePicker" aria-describedby="">
                                {{--{{ Form::text('end',null,['class'=>'form-control']) }}--}}
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Notice file*</label>
                        <div class="col-sm-10">
                            <div class="form-group files color">
                                <input type="file" name="file" class="form-control" multiple="">
                            </div>
                        </div>
                    </div>
                    <div style="float: right">
                        <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                    </div>
                    {{--</form>--}}
                    {{ Form::close() }}

                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- /Pop Up Model for button End***-->
@stop
<!-- /Notices page inner Content End***-->

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
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datePicker')
                .datepicker({
                    format: 'yyyy-mm-dd'
                })
        });
    </script>
    <script>
        function confirmDelete(){
            let x = confirm('Are you sure you want to delete this notice?');
            return !!x;
        }
    </script>
@stop

