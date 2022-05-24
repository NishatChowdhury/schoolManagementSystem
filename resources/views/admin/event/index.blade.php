@extends('layouts.fixed')

@section('title','Upcoming Events')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Events</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Event</a></li>
                        <li class="breadcrumb-item active">Events</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- ***/Events page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <a href="{{ action('UpcomingEventController@create') }}" class="btn btn-info btn-sm"> <i class="fas fa-plus-circle"></i> Add Event</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Time & Venue</th>
                                    <th>Short Description</th>
                                    <th>Thumbnail</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td>{{ $event->title }}</td>
                                        <td>
                                            {{ $event->date }}&nbsp;{{ $event->time }}<br>
                                            {{ $event->venue }}
                                        </td>
                                        <td>{!! $event->details !!}</td>
                                        <td>
                                            <img src="{{ asset('assets/img/events/') }}/{{ $event->image }}" alt="" width="60">
                                        </td>
                                        <td>
                                            {{ Form::model($event,['action'=>['UpcomingEventController@destroy',$event->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                            <a href="{{ action('UpcomingEventController@edit',$event->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            {{ Form::submit('X',['class'=>'btn btn-danger btn-sm']) }}
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-sm-12 col-md-9">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing {{ $events->firstItem() }} to {{ $events->lastItem() }} of {{ $events->total() }} entries</div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                  {{ $events->appends('page')->links() }}
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
            $('.datePicker')
                .datepicker({
                    format: 'yyyy-mm-dd'
                })
        });
    </script>
    <script>
        function confirmDelete(){
            let x = confirm('Are you sure you want to delete this Event?');
            return !!x;
        }
    </script>
@stop

