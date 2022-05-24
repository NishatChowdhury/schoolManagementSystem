@extends('layouts.fixed')

@section('title','Journals')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Journals</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Accounts</a></li>
                        <li class="breadcrumb-item active">Journals</li>
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
                            {{ Form::open(['action'=>'JournalController@index','method'=>'get','class'=>'form-inline']) }}
                            <label class="sr-only">Start Date: </label>
                            {{ Form::date('start',null,['class'=>'form-control mr-sm-2','placeholder'=>'Start Date']) }}
                            <label class="sr-only">End Date: </label>
                            {{ Form::date('end',null,['class'=>'form-control mr-sm-2','placeholder'=>'End Date']) }}
                            <label class="sr-only">Account Head: </label>
                            {{ Form::select('head',$coa,null,['class'=>'form-control mr-sm-2 select2','placeholder'=>'Select Account Head']) }}
                            <button type="submit" class="btn btn-primary ml-2"><i class="fas fa-search"></i></button>
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
                        <div class="card-header d-flex">
                            <h3 class="card-title"><span style="padding-right: 10px;margin-left: 10px;"><i class="fas fa-book" style="border-radius: 50%; padding: 15px; background: #3d807a; color: #ffffff;"></i></span>Total Found : {{ $journals->count() }}</h3>
                            {{--                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> Add</button>--}}
                            <div class="ml-auto media">
                                <a href="{{ action('JournalController@create') }}" class="btn btn-success align-self-center"><i class="fas fa-plus-circle"></i> Create Journal</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name </th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($journals as $journal)
                                    <tr>
                                        <th><a class="btn btn-outline-primary btn-sm text-bold" href="{{ action('JournalController@show',$journal->id) }}">{{ $journal->journal_no }}</a></th>
                                        <td>{{ $journal->date }}</td>
                                        <td>{{ $journal->items->sum('credit') }}</td>
                                        <td>{{ $journal->description }}</td>
                                        <td>
                                            {{ Form::open(['action'=>['JournalController@destroy',$journal->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                            <a href="{{ action('JournalController@show',$journal->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
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

    <!-- Pagination Start -->
    <div class="mb-3">
        <div class="d-flex justify-content-center">
            {{ $journals->links() }}
        </div>
    </div>
    <!-- Pagination End -->

@stop

<!-- *** External CSS File-->

@section('script')
    <script>
        $(function () {
            $('.select2').select2();
        });
    </script>
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this journal?');
            return !!x;
        }
    </script>
@stop
