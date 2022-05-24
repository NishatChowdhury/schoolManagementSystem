@extends('layouts.front-inner')

@section('title','Inner Page')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>News</h2>
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
            @foreach($newses as $news)
                <div class="list-card align-items-center shadow-v1 marginTop-30">
                    <div class="col-lg-4 px-lg-4 my-4">
                        <img class="w-100" src="{{ asset('assets/files/notice') }}/{{ $news->file }}" alt="">
                    </div>
                    <div class="col-lg-8 paddingRight-30 my-4">
                        <div class="media justify-content-between">
                            <div class="group">
                                <a href="{{ action('FrontController@newsDetails',$news->id) }}" class="h4">
                                    {{ $news->title }}
                                </a>
                                <ul class="list-inline mt-3">
                                    <li class="list-inline-item mr-2">
                                        <i class="ti-user mr-2"></i>
                                        {{ $news->category ? $news->category->name : 'uncategorized' }}
                                    </li>
                                    <li class="list-inline-item mr-2">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <span class="text-dark">5</span>
                                        <span>(4578)</span>
                                    </li>
                                </ul>
                            </div>
                            {{--<a href="#" class="btn btn-opacity-primary iconbox iconbox-sm" data-container="body" data-toggle="tooltip" data-placement="top" data-skin="light" title="" data-original-title="Add to wishlist">--}}
                            {{--<i class="ti-heart"></i>--}}
                            {{--</a>--}}
                        </div>
                        <p>
                            {{ $news->description }}
                        </p>
                        <div class="d-md-flex justify-content-between align-items-center">
                            <ul class="list-inline mb-md-0">
                                <li class="list-inline-item mr-3">
                                    <span class="h4 d-inline text-primary">$180</span>
                                    <span class="h6 d-inline small text-gray"><s>$249</s></span>
                                </li>
                                <li class="list-inline-item mr-3">
                                    <i class="ti-headphone small mr-2"></i>
                                    46 lectures
                                </li>
                                <li class="list-inline-item mr-3">
                                    <i class="ti-time small mr-2"></i>
                                    27.5 hours
                                </li>
                            </ul>
                            <a href="{{ action('FrontController@newsDetails',$news->id) }}" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="row">
                <div class="col-12 marginTop-70">
                    <ul class="pagination pagination-primary justify-content-center">
                        <li class="page-item mx-1">
                            <a class="page-link iconbox iconbox-sm rounded-0" href="#">
                                <i class="ti-angle-left small"></i>
                            </a>
                        </li>
                        <li class="page-item mx-1">
                            <a class="page-link iconbox iconbox-sm rounded-0" href="#">1</a>
                        </li>
                        <li class="page-item active disabled mx-1">
                            <a class="page-link iconbox iconbox-sm rounded-0" href="#">2</a>
                        </li>
                        <li class="page-item mx-1">
                            <a class="page-link iconbox iconbox-sm rounded-0" href="#">3</a>
                        </li>
                        <li class="page-item disabled mx-1">
                            <a class="page-link iconbox iconbox-sm rounded-0" href="#">
                                <i class="ti-more-alt"></i>
                            </a>
                        </li>
                        <li class="page-item mx-1">
                            <a class="page-link iconbox iconbox-sm rounded-0" href="#">16</a>
                        </li>
                        <li class="page-item mx-1">
                            <a class="page-link iconbox iconbox-sm rounded-0" href="#">
                                <i class="ti-angle-right small"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div> <!-- END row-->
        </div>  <!-- container-->
    </section>
@stop
