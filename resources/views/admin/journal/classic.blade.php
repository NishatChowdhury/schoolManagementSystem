@extends('layouts.fixed')

@section('title','Journal Classic')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Journal Classic</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Accounts</a></li>
                        <li class="breadcrumb-item active">Journal Report</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content mb-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            {{ Form::open(['action'=>'JournalController@classic','method'=>'get','class'=>'form-inline']) }}
                            <label class="col-sm-2">Start Date</label>
                            {{ Form::date('start',null,['class'=>'form-control mr-sm-2']) }}
                            <label class="col-sm-2">End Date</label>
                            {{ Form::date('end',null,['class'=>'form-control mr-sm-2']) }}
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***/Image page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Heading and Description</th>
                                    <th>Journal no.</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($journals as $journal)
                                    <tr>
                                        <td>{{ $journal->date }}</td>
                                        <td>
                                            @foreach($journal->items as $item)
                                                {{ $item->coa->name }}<br>
                                            @endforeach
                                            <small class="text-secondary"><em>{{ $journal->description }}</em></small>
                                        </td>
                                        <th><a class="btn btn-outline-primary btn-sm text-bold" href="{{ action('JournalController@show',$journal->id) }}">{{ $journal->journal_no }}</a></th>
                                        <td>
                                            @foreach($journal->items as $item)
                                                <p>{{ $item->debit }}</p>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($journal->items as $item)
                                                <p>{{ $item->credit }}</p>
                                            @endforeach
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

    <div class="col-md-12 mt-3">
        <div class="d-flex justify-content-center">
            {{ $journals->appends(Request::all())->links() }}
        </div>
    </div>

    <!-- ***/ Pop Up Model for button -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open(['action'=>'PlaylistController@store','method'=>'post']) }}
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Playlist Name</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{--<input type="text" class="form-control" id=""  aria-describedby="">--}}
                                {{ Form::text('name',null,['class'=>'form-control']) }}
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
@stop
<!--/Image page inner Content End***-->

<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
@stop

@section('script')
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this journal?');
            return !!x;
        }
    </script>
@stop
