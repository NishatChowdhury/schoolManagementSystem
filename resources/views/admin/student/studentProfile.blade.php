@extends('layouts.fixed')

@section('title','Student Profile')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Student</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Student Profile</li>
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
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{ asset('assets/img/students/') }}/{{ $student->image }}"
                                     alt="">
                            </div>

                            <h2 class="profile-username text-center">{{ $student->name }}</h2>
                            <p class="text-muted text-center">
                                {{ $student->studentId }} <br>
                                {{ $student->mobile }} <br>
                                {{ $student->email ? $student->email : 'N/A' }} <br>
                                Date Of Birth : {{ $student->dob ? \Carbon\Carbon::parse($student->dob)->format('d m Y') : 'N/A' }}
                            </p>


                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Class</b> <a class="float-right">{{ $student->classes->name }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Section</b> <a class="float-right">{{ $student->section ? $student->section->name : 'N/A' }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Group</b> <a class="float-right">{{ $student->group ? $student->group->name : 'N/A'}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Roll</b> <a class="float-right">{{ $student->rank }}</a>
                                </li>
                            </ul>
                                @if($student->status ==1)
                                    <a href="#" class="btn btn-primary btn-block"><b>Active</b></a>
                                @else
                                    <a href="#" class="btn btn-danger btn-block"><b>Drop Out</b></a>
                                @endif

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <br>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fa fa-male"></i> Father Name</strong>
                            <hr>
                            <p class="text-muted">
                                {{ $student->father }} <br> {{ $student->father_mobile }}
                            </p>
                            <hr>
                            <strong><i class="fa fa-female"></i> Mother Name</strong>
                            <hr>
                            <p class="text-muted">
                                {{ $student->mother }} <br> {{ $student->mother_mobile }}
                            </p>
                            <hr>

                            <strong><i class="fa fa-map-marker mr-1"></i> Address</strong>

                            <p class="text-muted">
                                {{ $student->address ? $student->address : 'N/A'}} <br>
                                {{ $student->area ? $student->area : 'N/A' }} <br>
                                {{ $student->zip ? $student->zip : 'N/A' }} <br>
                                {{ $student->city_id ? $student->city->name : 'N/A' }} <br>
                                {{ $student->state_id ? $student->division->name : 'N/A' }} <br>
                                {{ $student->country_id ? $student->country->name : 'N/A' }}
                            </p>

                            <hr>

                            <strong><i class="fa fa-transgender"></i> Gender</strong>
                            <hr>
                               {{ $student->gender_id ? $student->gender->name : 'N/A'}}
                            <hr>

                            <strong><i class="fa fa-heart"></i> Religion</strong>
                            <hr>
                                {{ $student->religion_id ? $student->religion->name : 'N/A'  }}

                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
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
                                    <table class="table table-striped table-bordered table-sm">
                                        <thead class="thead-dark">
                                        <tr style="text-align: center">
                                            <th>Date</th>
                                            <th>Inv No.</th>
                                            <th>Setup Amount</th>
                                            <th>Arrears</th>
                                            <th>Fine</th>
                                            <th>Discount</th>
                                            <th>Paid Amount</th>
                                            <th>Due</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($payments as $payment)
                                            <tr>
                                                <td style="text-align: center">{{\Carbon\Carbon::parse($payment->created_at)->format('m F Y')}}</td>
                                                <td style="text-align: center">{{$payment->id}}</td>
                                                <td style="text-align: right">{{ number_format($payment->setup_amount,2) }} </td>
                                                <td style="text-align: right">{{ number_format($payment->arrears,2) }} </td>
                                                <td style="text-align: right">{{ number_format($payment->fine,2) }}</td>
                                                <td style="text-align: right">{{ number_format($payment->discount,2) }}</td>
                                                <td style="text-align: right">{{ number_format($payment->paid_amount,2) }}</td>
                                                <td style="text-align: right">{{ number_format($payment->due,2) }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@stop
