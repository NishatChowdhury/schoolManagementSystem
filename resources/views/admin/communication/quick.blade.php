@extends('layouts.fixed')

@section('title', 'Communication | Quick SMS')

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
                        <li class="breadcrumb-item active"> Quick SMS</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{--description--}}
                    {{ Form::open(['action'=>'CommunicationController@quickSend','method'=>'post']) }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-5">
                                            <label for="">Numbers <small>(add multiple numbers with "+" sign)</small></label>
                                            <div class="input-group">
                                                <textarea class="form-control descriptionLen" rows="5"  placeholder="01XXXXXXXXX+01XXXXXXXXX+01XXXXXXXXX" name="numbers" cols="50" id="textarea"></textarea>
                                            </div>
                                            <p></p>
                                            <label for="">SMS Description</label>
                                            <div class="input-group">
                                                <textarea class="form-control descriptionLen" rows="5"  placeholder="type sms here.." name="message" cols="50" id="textarea"></textarea>
                                            </div>
                                            <p></p>
                                            <div class="input-group">
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