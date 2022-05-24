@extends('layouts.fixed')

@section('title','Set Feature Services')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Featured Service</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Feature</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    @if(Session::has('success'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    <!-- ***/Events page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <a href="{{ action('FeatureController@create') }}" class="btn btn-info btn-sm"> <i class="fas fa-plus-circle"></i> Add New</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($features as $feature)
                                    <tr>
                                        <td>{{ $feature->id }}</td>
                                        <td>
                                            {{ $feature->name }}
                                            @if($feature->active == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ Form::model($feature,['action'=>['FeatureController@update',$feature->id],'method'=>'patch']) }}
                                            <select name="active" class="active" title="Toggle activeness">
                                                <option value="0" {{ $feature->active == 0 ? 'selected' : '' }}>Inactive</option>
                                                <option value="1" {{ $feature->active == 1 ? 'selected' : '' }}>Active</option>
                                            </select>
                                            {{ Form::close() }}
                                        </td>
                                        <td>
                                            <img src="{{ asset('assets/img/features/') }}/{{ $feature->image }}" alt="" width="60">
                                        </td>
                                        <td>
                                            {{ Form::model($feature,['action'=>['FeatureController@destroy',$feature->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                            <a href="{{ action('FeatureController@edit',$feature->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            {{ Form::submit('X',['class'=>'btn btn-danger btn-sm']) }}
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-sm-12 col-md-9">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing {{ $features->firstItem() }} to {{ $features->lastItem() }} of {{ $features->total() }} entries</div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    {{ $features->appends('page')->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
<!-- /Events page inner Content End***-->

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
            $('.active').change(function(){
                $(this).closest('form').submit();
            })
        });
    </script>
    <script>
        function confirmDelete(){
            let x = confirm('Are you sure you want to delete this Feature from home page?');
            return !!x;
        }
    </script>
@stop

