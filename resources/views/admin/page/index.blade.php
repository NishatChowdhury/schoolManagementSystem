@extends('layouts.fixed')

@section('title','Settings | Pages')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Configured Pages </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Configured Pages</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- ***/Configured page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            {{--<div class="row">--}}
                                {{--<h3 class="card-title"><span style="padding-right: 10px;margin-left: 10px;"><i class="fas fa-user-graduate" style="border-radius: 50%; padding: 15px; background: #3d807a;"></i></span>Total Found : 1000</h3>--}}
                            {{--</div>--}}
                            <div class="row">
                                <div>
                                    <a class="btn btn-info btn-sm" href="{{ action('PageController@create') }}" style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Site</th>
                                    <th>Page</th>
                                    <th>Content</th>
                                    <th>Used in</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pages as $page)
                                <tr>
                                    <td></td>
                                    <td>{{ $page->name }}</td>
                                    <td style="line-break:anywhere">{{ substr(strip_tags($page->content),0,99) }}</td>
                                    <td>{{ $page->order }}</td>
                                    <td>
                                        {{ Form::model($page,['action'=>['PageController@destroy',$page->id],'method'=>'delete','onsubmit'=>'confirmDelete()']) }}
                                        <a href="{{ action('PageController@edit',$page->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-sm-12 col-md-9">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing {{ $pages->firstItem() }} to {{ $pages->count() }} of {{ $pages->total() }} entries</div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    {{ $pages->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***/Pop Up Model for button -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Configure</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Page Name*</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <select id="inputState" class="form-control" style="height: 35px !important;">
                                        <option selected>Page...</option>
                                        <option>...</option>
                                        <option>...</option>
                                        <option>...</option>
                                        <option>...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Content*</label>
                            <div class="col-sm-10">
                                <textarea id="txtEditor"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Image*</label>
                            <div class="col-sm-10">
                                <div class="form-group files color">
                                    <input type="file" class="form-control" multiple="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Order*</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id=""  aria-describedby="">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div style="float: right">
                        <button type="button" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- /Pop Up Model for button End***-->
@stop
<!-- /Configured page inner Content End***-->


<!-- *** External CSS  File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/editor.css') }}">
@stop

<!-- *** External JS File-->
@section('plugin')
    <script src= "{{ asset('assets/js/editor.js') }}"></script>
@stop

<!-- Scripts-->
@section('script')
    <script>
        $(document).ready(function() {
            $("#txtEditor").Editor();
        });
    </script>
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this page?');
            return !!x;
        }
    </script>
@stop
