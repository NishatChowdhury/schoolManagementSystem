@extends('layouts.fixed')

@section('title','User | Profile')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Profile Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="col">
                <div class="row">
                    <div class="col">
                        {{ Form::model($user,['action'=>'UserController@update','method'=>'patch']) }}
                        <div class="card">
                            <div class="card-header text-center">Account Information</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    {{--<input type="text" name="name" class="form-control" id="name" aria-describedby="name">--}}
                                    {{ Form::text('name',null,['class'=>'form-control','id'=>'name']) }}
                                    @if($errors->first('name'))
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    {{--<input type="email" name="email" class="form-control" id="email" aria-describedby="email">--}}
                                    {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }}
                                    @if($errors->first('email'))
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>

                    <div class="col">
                        {{ Form::model($user,['action'=>'UserController@password','method'=>'patch']) }}
                        <div class="card">
                            <div class="card-header text-center">Change Password</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                    @if($errors->first('password'))
                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">Confirm New Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="password-confirm">
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Reset Password</button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>

                </div>
            </div>
        </div>
    </section>
@stop
