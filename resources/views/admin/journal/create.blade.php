@extends('layouts.fixed')

@section('title','Journal | Create')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Journal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Accounts</a></li>
                        <li class="breadcrumb-item active">Create Journal</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Journal</h3>
                        </div>
                        <div class="row">
                            @if($errors->any())
                                <ul class="text-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{ Form::open(['action'=>'JournalController@store','method'=>'post','id'=>'form']) }}
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="" class="col-form-label">Journal Number</label>
                                    {{ Form::text('journal_no',$journalNo,['class'=>'form-control','readonly']) }}

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="" class="col-form-label" >Transaction Date</label>
                                    {{ Form::date('date',null,['class'=>'form-control']) }}

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="" class="col-form-label">Reference:</label>
                                    {{ Form::text('reference',null,['class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Description:</label>
                                {{ Form::textarea('description',null,['class'=>'form-control','rows'=>5,'required']) }}
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="" class="col-form-label">Accounts</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="" class="col-form-label">Debit:</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="" class="col-form-label">Credit:</label>
                                </div>
                            </div>
                            <div class="row journal-entry">
                                <div class="form-group col-md-3">
                                    {{ Form::select('journal_id[]',$coa,null,['class'=>'form-control select2','placeholder'=>'Select Account']) }}
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::text('debit[]',null,['class'=>'form-control debit','placeholder'=>0]) }}
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::text('credit[]',null,['class'=>'form-control credit','placeholder'=>0]) }}
                                </div>
                                <div class="form-group col-md-1">
                                    <button type="button" onclick="addJournalEntry()" class="btn btn-success"><span class="fas fa-plus"></span></button>
                                </div>
                            </div>
                            <div class="row journal-entry">
                                <div class="form-group col-md-3">
                                    {{ Form::select('journal_id[]',$coa,null,['class'=>'form-control select2','placeholder'=>'Select Account']) }}
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::text('debit[]',null,['class'=>'form-control debit','placeholder'=>0]) }}
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::text('credit[]',null,['class'=>'form-control credit','placeholder'=>0]) }}
                                </div>
                                <div class="form-group col-md-1">
                                    <button type="button" class="btn btn-danger"><span class="fas fa-minus"></span></button>
                                </div>
                            </div>
                            <div class="row text-right" id="journal-calc">
                                <div class="form-group col-md-3">
                                    <label class="col-form-label"></label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label">Total Debit <span id="debit-total">0.00</span></label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label">Total Credit <span id="credit-total">0.00</span></label>
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="col-form-label"></label>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Save Journal</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@stop

@section('plugin-css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
@stop

@section('plugin')
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>

@stop

@section('script')
    <script>
        $(function () {
            $('.select2').select2();
        });

        $(".debit").keyup(function(){
            var sum = 0;
            $(".debit").each(function(){
                sum += +$(this).val();
            })
            $("#debit-total").text(sum+'.00');
        })
        $(".credit").keyup(function(){
            var sum = 0;
            $(".credit").each(function(){
                sum += +$(this).val();
            })
            $("#credit-total").text(sum+'.00');
        })
    </script>
    <script>
        function addJournalEntry(){
            var jar = $(".journal-entry").last();
            jar.clone().insertAfter(jar);

            //$(".select2").last().select2();
            //$(".select2").last().select2();

                $('.select2').select2();
                $('.select2').select2();
                $('.select2').last().remove();
                $('.select2').last().remove();
            //var jar = $("#journal-entry").clone().insertAfter('#journal-entry');

            $(".debit").keyup(function(){
                var sum = 0;
                $(".debit").each(function(){
                    sum += +$(this).val();
                })
                $("#debit-total").text(sum+'.00');
            })
            $(".credit").keyup(function(){
                var sum = 0;
                $(".credit").each(function(){
                    sum += +$(this).val();
                })
                $("#credit-total").text(sum+'.00');
            })
        }
    </script>
    <script>
        $("#form").submit(function(e){
            var d = $("#debit-total").text();
            var c = $("#credit-total").text();
            if(d !== c){
                alert('Debit is not equal to Credit!');
                e.preventDefault();
            }
        })
    </script>
@stop
