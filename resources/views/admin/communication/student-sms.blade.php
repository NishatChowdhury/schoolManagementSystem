@extends('layouts.fixed')

@section('title', 'Communication | Student SMS')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Student SMS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Communication</a></li>
                        <li class="breadcrumb-item active"> Student SMS</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ Form::open(['action'=>'CommunicationController@student','method'=>'get']) }}
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Student ID</label>
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Student ID" name="studentId" type="text">
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Session</label>
                                    <div class="input-group">
                                        {{--<select class="form-control" name="class_id"><option selected="selected" value="">Select Class</option></select>--}}
                                        {{ Form::select('session_id',$repository->sessions(),null,['class'=>'form-control','placeholder'=>'Select Class']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Class</label>
                                    <div class="input-group">
                                        {{--<select class="form-control" name="class_id"><option selected="selected" value="">Select Class</option></select>--}}
                                        {{ Form::select('class_id',$repository->classes(),null,['class'=>'form-control','placeholder'=>'Select Class']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Section</label>
                                    <div class="input-group">
                                        {{--<select class="form-control" name="section_id"><option selected="selected" value="">Select Section</option></select>--}}
                                        {{ Form::select('section_id',$repository->sections(),null,['class'=>'form-control','placeholder'=>'Select Section']) }}

                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Group</label>
                                    <div class="input-group">
                                        {{--<select class="form-control" name="group_id"><option selected="selected" value="">Select Group</option></select>--}}
                                        {{ Form::select('group_id',$repository->groups(),null,['class'=>'form-control','placeholder'=>'Select Group']) }}

                                    </div>
                                </div>

                                <div class="col-1" style="padding-top: 32px;">
                                    <div class="input-group">
                                        <button style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>

                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                    {{--description--}}
                    {{ Form::open(['action'=>'CommunicationController@send','method'=>'post']) }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-5">
                                            <label for="">SMS Description</label>
                                            <div class="input-group">
                                                {{ Form::hidden('group','student') }}
                                                <textarea class="form-control descriptionLen" rows="5"  placeholder="type sms here.." name="message" cols="50" id="textarea"></textarea>
                                            {{ Form::submit('SEND',['class'=>'btn btn-primary']) }}
                                            </div>
                                            <p>
                                                <code>length : </code><span id="msgcount">0</span>/<span id="charcount">0</span>
                                                {{ Form::hidden('sms_count',0,['id'=>'inputsmscount']) }}
                                            </p>
                                            {{--<p style="display: inline-block;padding: 5px;margin: 10px 0 0 0" class="bg-primary;"> Total Word Count :--}}
                                                {{--<div class="length" style="display: inline-block"></div>--}}
                                            {{--</p>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--list--}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <label for=""> Student List </label>
                                    <table id="" class="table table-bordered" style=>
                                        <thead class="thead-light">
                                        <tr>
                                            <td colspan="3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" checked id="select_all_head">
                                                    <label class="form-check-label" for="exampleCheck1">Select All</label>
                                                    <span style="color:blue">Selected:<span id="check-box-length"></span></span>
                                                </div>
                                            </td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                        <tr>
                                            <td>
                                                {{ Form::checkbox('id[]',$student->id,true,['class'=>'checkbox']) }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('assets/img/students/') }}/{{ $student->image }}" height="75" alt="">
                                            </td>
                                            <td>
                                                ID : {{ $student->studentId }}<br>
                                                Name : {{ $student->name }} ({{ $student->mobile }})<br>
                                                Class : {{ $student->academicClass->academicClasses->name ?? '' }} {{ $student->section->name ?? '' }} {{ $student->group->name ?? ''}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" checked id="select_all_foot">
                                                    <label class="form-check-label" for="exampleCheck1">Select All</label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>





@stop

@section('script')
    <script>
        $("#textarea").keyup(function(){
            var textCount = $("#textarea").val().length;
            $("#charcount").text(textCount);
            $("#msgcount").text(Math.ceil(textCount/160));
            $("#inputsmscount").val(Math.ceil(textCount/160));
            //alert(textCount);
        })
    </script>
    {{--<script>--}}
        {{--function counter(){--}}
            {{--var text = $('.descriptionLen').val();--}}
            {{--$(".length").text(text.length+1);--}}
        {{--}--}}
        {{--$(document).on('keydown change','.descriptionLen',function () {--}}
           {{--counter();--}}
        {{--});--}}
    {{--</script>--}}

    <script>
        $('#select_all_head,#select_all_foot').change(function() {
            var checkboxes = $(this).closest('form').find(':checkbox');
            if($(this).is(':checked')) {
                checkboxes.prop('checked', true);
            } else {
                checkboxes.prop('checked', false);
            }
        });
    </script>
    <script>
        $(document).change(function(){
            //var total = $("input[type=checkbox]:checked").length;
            var total = $(".checkbox:checked").length;
            // if($("#select_all_head").is(':checked') || $("#select_all_foot").is(':checked')){
            //     total = total - 2;
            // }
            $("#check-box-length").html(total);
        });
        $(document).ready(function(){
            var total = $(".checkbox:checked").length;
            // var total = $("input[type=checkbox]:checked").length;
            $("#check-box-length").html(total);
        });
    </script>



@stop
