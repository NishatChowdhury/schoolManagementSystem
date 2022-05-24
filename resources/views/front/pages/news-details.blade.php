@extends('layouts.front-inner')

@section('title','Inner Page')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>News Details</h2>
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
                            News Details
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
                        <img src="{{ asset('assets/files/notice') }}/{{ $news->file }}" alt="">
                        <ul class="list-inline text-gray">
                            <li class="list-inline-item mr-3">
                                <i class="ti-file mr-1"></i>
                                {{ $news->category ? $news->category->name : '' }}
                            </li>
                            <li class="list-inline-item mr-3">
                                <i class="ti-time mr-1"></i>
                                {{ $news->start->format('F Y, d') }}
                            </li>
                            {{--<li class="list-inline-item mr-3">--}}
                                {{--<i class="ti-location-pin mr-1"></i>--}}
                                {{--Room:102, block: A, New auditorium building--}}
                            {{--</li>--}}
                        </ul>
                        <h4 class="mb-4">
                            {{ $news->title }}
                        </h4>
                        {{ $news->description }}
                        <a href="{{ action('FrontController@news') }}" class="btn btn-primary mt-4">Back To News</a>
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
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>
@stop
