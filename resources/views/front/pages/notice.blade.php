@extends('layouts.front-inner')

@section('title','Inner Page')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>Notice</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Elements</a>
                        </li>
                        <li class="breadcrumb-item">
                            About us
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="paddingTop-50 paddingBottom-100 bg-light-v2">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mt-5">

                    @foreach($notices as $notice)
                        <div class="d-md-flex justify-content-between align-items-center bg-white shadow-v1 rounded mb-4 py-4 px-5 hover:transformLeft">
                            <div class="media align-items-center">
                                <div class="text-center border-right pr-4">
                                    <strong class="text-primary font-size-38">
                                        @if($notice->start != null)
                                            {{ $notice->start->format('d') }}
                                        @endif
                                    </strong>
                                    <p class="mb-0 text-gray">
                                        @if($notice->start != null)
                                            {{ $notice->start->format('M, Y') }}
                                        @endif
                                    </p>
                                </div>
                                <div class="media-body p-4">
                                    <p class="mb-1 text-gray">
                                        <i class="ti-file"></i>
                                        Event
                                    </p>
                                    <a href="{{ action('FrontController@noticeDetails',$notice->id) }}" class="h5">
                                        {{ $notice->title }}
                                    </a>
                                </div>
                            </div>
                            @if($notice->file)
                                <a href="{{ asset('assets/files/notice') }}/{{ $notice->file }}" class="btn btn-outline-primary" target="_blank"><i class="fas fa-download"></i></a>
                            @endif
                            <a href="{{action('FrontController@noticeDetails',$notice->id)}}" class="btn btn-outline-primary">Read More</a>
                        </div>
                    @endforeach

                    <div class="text-center mt-5">
                        <a href="#" class="btn btn-outline-primary btn-icon">
                            <i class="ti-reload mr-2"></i>
                            Load More
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 mt-5">
                    <div class="card shadow-v1">
                        <div class="card-header border-bottom">
                            <h4 class="mb-0">Category List</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                @foreach($categories as $category)
                                    <li class="mb-3"><a href="">{{ $category->name }} ({{ $category->notices->count() }})</a></li>
                                @endforeach
                                {{--<li class="mb-3"><a href="">Web Development (28)</a></li>--}}
                                {{--<li class="mb-3"><a href="">Mobile Apps (4)</a></li>--}}
                                {{--<li class="mb-3"><a href="">Business (10)</a></li>--}}
                                {{--<li class="mb-3"><a href="">IT &amp; Software (22)</a></li>--}}
                                {{--<li class="mb-3"><a href="">Data Science (6)</a></li>--}}
                                {{--<li class="mb-3"><a href="">Design (16) </a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>















    {{--<section class="padding-y-100 border-bottom">--}}
    {{--<div class="container">--}}
    {{--<div class="row align-items-center">--}}

    {{--<table class="table table-bordered">--}}
    {{--<thead>--}}
    {{--<tr>--}}
    {{--<th>SL</th>--}}
    {{--<th>Date</th>--}}
    {{--<th>Title</th>--}}
    {{--<th></th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody>--}}
    {{--@foreach($notices as $notice)--}}
    {{--<tr>--}}
    {{--<td></td>--}}
    {{--<td>{{ $notice->start }}</td>--}}
    {{--<td>{{ $notice->title }}</td>--}}
    {{--<td></td>--}}
    {{--</tr>--}}
    {{--@endforeach--}}
    {{--</tbody>--}}
    {{--</table>--}}

    {{--</div> <!-- END row-->--}}
    {{--</div> <!-- END container-->--}}
    {{--</section>--}}

@stop
