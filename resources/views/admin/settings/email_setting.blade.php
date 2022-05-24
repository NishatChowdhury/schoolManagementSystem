@extends('layouts.fixed')

@section('title','Settings | Email Setting')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Email Setting</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Email Setting</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- ***/Image page inner Content Start-->
    <?php
        $mail_driver = env("MAIL_MAILER","smtp");
        $hostname = env("MAIL_HOST","smtp.mailtrap.io");
        $mail_port = env("MAIL_PORT","2525");
        $username = env("MAIL_USERNAME","");
        $password = env("MAIL_PASSWORD","");
        $encryption = env("MAIL_ENCRYPTION","");
        $form_address = env("MAIL_FROM_ADDRESS","");
        $form_name = env("APP_NAME","Laravel");
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{ Form::open(['action'=>'emailSettingController@store','method'=>'post','files'=>true]) }}
                            <div class="form-group row">
                                <div class="col-md-4">
                                    {{ Form::label('mail_driver', 'Mail Driver:') }}
                                    {{ Form::text('mail_driver',$mail_driver, ['placeholder' => '','class'=>'form-control']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('mail_host', 'Mail Host:') }}
                                    {{ Form::text('mail_host', $hostname, ['placeholder' => '','class'=>'form-control']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('mail_port', 'Mail Port:') }}
                                    {{ Form::text('mail_port', $mail_port, ['placeholder' => '','class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    {{ Form::label('username', 'Username:') }}
                                    {{ Form::text('username', $username, ['placeholder' => '','class'=>'form-control']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('password', 'Password:') }}
                                    {{ Form::text('password', $password, ['placeholder' => '','class'=>'form-control']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('encryption', 'Encryption:') }}
                                    {{ Form::text('encryption', $encryption, ['placeholder' => '','class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    {{ Form::label('from_address', 'Form Address:') }}
                                    {{ Form::text('from_address', $form_address, ['placeholder' => '','class'=>'form-control']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('from_name', 'Form Name:') }}
                                    {{ Form::text('from_name', $form_name, ['placeholder' => '','class'=>'form-control']) }}
                                </div>
                            </div>
                            <div style="text-align: center">
                                <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Update</button>
                            </div>
                            </div>


                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
@section('script')
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want delete this calender schedule?');
            return !!x;
        }
    </script>
@stop




