@extends('layouts.fixed')

@section('title','Videos')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Video Playlists</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Playlist</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- ***/Image page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <h3 class="card-title"><span style="padding-right: 10px;margin-left: 10px;"><i class="fas fa-book" style="border-radius: 50%; padding: 15px; background: #3d807a; color: #ffffff;"></i></span>Total Found : {{ $playlist->videos->count() ?? '' }}</h3>
                            </div>
                            <div class="row">
                                <div>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> Add</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Videos</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($playlist->videos as $video)
                                    <tr>
                                        <th>{{ $video->id }}</th>
                                        <td>{{ $video->title }}</td>
                                        <td>{!! $video->code !!}</td>
                                        <td>
                                            {{ Form::open(['action'=>['VideoController@destroy',$playlist->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                            <button type="button" onclick="loadEditForm({{$video->id}})" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></button>
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
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


    <!-- ***/ Pop Up Model for button -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open(['action'=>'VideoController@store','method'=>'post']) }}
                    {{ Form::hidden('playlist_id',$playlist->id) }}
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Video Title*:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{--<input type="text" class="form-control" id=""  aria-describedby="">--}}
                                {{ Form::text('title',null,['class'=>'form-control','required']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Paste youtube embed code*:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{--<input type="text" class="form-control" id=""  aria-describedby="">--}}
                                {{ Form::textarea('code',null,['class'=>'form-control','required']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Sorting Order:</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{--<input type="text" class="form-control" id=""  aria-describedby="">--}}
                                {{ Form::text('order',null,['class'=>'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div style="float: right">
                        <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                    </div>
                    {{ Form::close() }}
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for button End-->

    <!-- ***/ Pop Up Model for button -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Add Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-body">
                    <!-- Edit form will appeared here -->
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for button End-->
@stop
<!--/Image page inner Content End***-->

<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
@stop

@section('script')
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this playlist? All albums and images in this video will also be deleted!!!');
            return !!x;
        }
    </script>
    <script>
        function loadEditForm(id){
            var token = "{{ csrf_token() }}";
            $.ajax({
                url:"{{ route('video.edit') }}",
                data: {_token:token,id:id},
                type: 'get'
            }).done(function(e){
                //$("#edit-form").remove();
                $("#modal-body").html(e);
            })
        }
    </script>
@stop
