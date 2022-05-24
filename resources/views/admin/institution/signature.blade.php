@extends('layouts.fixed')

@section('title','Institution Mgnt | Signature')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Signature</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Institution</a></li>
                        <li class="breadcrumb-item active">Signature</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    @if($errors->any())
        <ul class="label-danger">
            @foreach($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6">
                                <table id="example2" class="table table-bordered" style="margin: 10px;">
                                    <thead>
                                    <tr>
                                        <th>
                                            <h3 class="card-title"> Institution Signature </h3>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="card-body">
                                                {{ Form::open(['action'=>'InstitutionController@sig','method'=>'post','files'=>true]) }}
                                                    <div class="form-group row">
{{--                                                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Status</label>--}}
{{--                                                        {{ Form::label('signature', 'Signature', ['class' => 'control-label']) }}--}}
                                                        <div class="col-sm-10 mb-4">
                                                            <div class="input-group">
                                                                {{ Form::file('signature',['onchange'=>'readURL(this)','class'=>'form-control', 'id'=>"file-input"]) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                {{ Form::submit('Save Signature',['class'=>'btn btn-success']) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                {{ Form::close() }}
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table id="example2" class="table table-bordered" style="margin: 10px;">
                                    <thead>
                                    <tr>
                                        <th>
                                            <h3 class="card-title"> Preview </h3>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="card-body" style="display:flex;justify-content: center">
                                                <img src="{{ asset('assets/img/signature/signature.png') }}" width="200" id="blah" alt="" >
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result).width(150).height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@stop
