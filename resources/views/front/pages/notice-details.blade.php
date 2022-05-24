@extends('layouts.front-inner')

@section('title','Inner Page')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>Notice Details</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Elements</a>
                        </li>
                        <li class="breadcrumb-item">
                            Notice Details
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
                    <div class="card align-items-start shadow-v1 p-5">
                        <ul class="list-inline text-gray">
                            <li class="list-inline-item mr-3">
                                <i class="ti-file mr-1"></i>
                                {{ $notice->category ? $notice->category->name : '' }}
                            </li>
                            <li class="list-inline-item mr-3">
                                <i class="ti-time mr-1"></i>
                                @if($notice->start)
                                    {{ $notice->start->format('F Y, d') }}
                                @else
                                    {{ $notice->created_at->format('F Y, d') }}
                                @endif
                            </li>
                            {{--<li class="list-inline-item mr-3">--}}
                            {{--<i class="ti-location-pin mr-1"></i>--}}
                            {{--Room:102, block: A, New auditorium building--}}
                            {{--</li>--}}
                        </ul>
                        <h4 class="mb-4">
                            {{ $notice->title }}
                        </h4>
                        <p id="url">
                            {{ $notice->description }}
                        </p>
{{--                        <img src="{{ asset('assets/files/notice') }}/{{ $notice->file }}" alt="" class="img-fluid">--}}
                        @if($notice->file)
                        <embed src="{{ asset('assets/files/notice') }}/{{ $notice->file }}" class="img-fluid" type="application/pdf" style="width: 100%;height: 500px">
                        @endif
                        <a href="{{ action('FrontController@notice') }}" class="btn btn-primary mt-4">Back To Notices</a>
                        @if($notice->file)
                            <a href="{{ asset('assets/files/notice') }}/{{ $notice->file }}" class="btn btn-outline-primary" target="_blank"><i class="fas fa-download"></i></a>
                        @endif
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
@stop

@section('script')
    <script>
            var text=document.getElementById("url").innerText;
            var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
            var text1=text.replace(exp, "<a href='$1'>$1</a>");
            var exp2 =/(^|[^\/])(www\.[\S]+(\b|$))/gim;
            document.getElementById("url").innerHTML=text1.replace(exp2, '$1<a target="_blank" href="http://$2">$2</a>');
    </script>
@stop
