@extends('layouts.fixed')

@section('title','Student Profile')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Staff</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Staff Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#account" data-toggle="tab">Account</a></li>
                                <li class="nav-item"><a class="nav-link" href="#attendance" data-toggle="tab">Attendence</a></li>
                                <li class="nav-item"><a class="nav-link" href="#result" data-toggle="tab">Result</a></li>
                                <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="account">
                                    <div class="card-title text-center"><h4>Fee Collection</h4></div>

                                </div>

                                <div class="tab-pane" id="attendance">
                                    <div class="card-title text-center"><h4>Attendance Report</h4></div>
                                </div>

                                <div class="tab-pane" id="result">
                                    <div class="card-title text-center"><h4>Result</h4></div>
                                </div>

                                <div class="tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="user image">
                                            <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fa fa-times"></i></a>
                        </span>
                                            <span class="description">Shared publicly - 7:30 PM today</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>

                                        <p>
                                            <a href="#" class="link-black text-sm mr-2"><i class="fa fa-share mr-1"></i> Share</a>
                                            <a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up mr-1"></i> Like</a>
                                            <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="fa fa-comments-o mr-1"></i> Comments (5)
                          </a>
                        </span>
                                        </p>

                                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post clearfix">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="{{ asset('dist/img/user7-128x128.jpg') }}" alt="User Image">
                                            <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fa fa-times"></i></a>
                        </span>
                                            <span class="description">Sent you a message - 3 days ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>

                                        <form class="form-horizontal">
                                            <div class="input-group input-group-sm mb-0">
                                                <input class="form-control form-control-sm" placeholder="Response">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-danger">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="{{ asset('dist/img/user6-128x128.jpg') }}" alt="User Image">
                                            <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fa fa-times"></i></a>
                        </span>
                                            <span class="description">Posted 5 photos - 5 days ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <img class="img-fluid" src="{{ asset('dist/img/photo1.png') }}" alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid mb-3" src="{{ asset('dist/img/photo2.png') }}" alt="Photo">
                                                        <img class="img-fluid" src="{{ asset('dist/img/photo3.jpg') }}" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid mb-3" src="{{ asset('dist/img/photo4.jpg') }}" alt="Photo">
                                                        <img class="img-fluid" src="{{ asset('dist/img/photo1.png') }}" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <p>
                                            <a href="#" class="link-black text-sm mr-2"><i class="fa fa-share mr-1"></i> Share</a>
                                            <a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up mr-1"></i> Like</a>
                                            <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="fa fa-comments-o mr-1"></i> Comments (5)
                          </a>
                        </span>
                                        </p>

                                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>

                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{ asset('assets/img/staffs/') }}/{{ $staff->image }}"
                                     alt="">
                            </div>

                            <h2 class="profile-username text-center">{{ $staff->name }}</h2>
                            <p class="text-muted text-center">
                                {{ $staff->title }}
                            </p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>ID</b> <a class="float-right">{{ $staff->card_id }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Mobile</b> <a class="float-right">{{ $staff->mobile ? $staff->mobile  : 'N/A' }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>E-mail</b> <a class="float-right">{{ $staff->mail ? $staff->mail : 'N/A' }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Birthday</b> <a class="float-right">{{ $staff->dob ? \Carbon\Carbon::parse($staff->dob)->format('d m Y') : 'N/A' }}</a>
                                </li>
                            </ul>
                            {{--@if($staff->status ==1)--}}
                            <a href="#" class="btn btn-primary btn-block"><b>Active</b></a>
                            {{--@else--}}
                            {{--<a href="#" class="btn btn-danger btn-block"><b>Drop Out</b></a>--}}
                            {{--@endif--}}

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <br>

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fa fa-male"></i> Father/Husband Name</strong>
                            <hr>
                            <p class="text-muted">
                                {{ $staff->father_husband }}
                            </p>
                            <hr>
                            <strong><i class="fa fa-female"></i> NID </strong>
                            <hr>
                            <p class="text-muted">
                                {{ $staff->nid }}
                            </p>
                            <hr>

                            <strong><i class="fa fa-map-marker mr-1"></i> Joning Date</strong>

                            <p class="text-muted">
                                {{ $staff->joining ? $staff->joining : 'N/A'}} <br>

                            </p>

                            <hr>

                            <strong><i class="fa fa-transgender"></i> Gender</strong>
                            <hr>
                            {{ $staff->gender_id ? $staff->gender->name : 'N/A'}}
                            <hr>

                            <strong><i class="fa fa-heart"></i> Blood Group</strong>
                            <hr>
                            {{ $staff->blood_group_id ? $staff->blood->name : 'N/A'  }}

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@stop
