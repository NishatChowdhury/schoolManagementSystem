@extends('layouts.front-inner')

@section('title','Gallery')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>Gallery</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Gallery</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-100 border-bottom border-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <ul class="nav tab-line tab-line--2x border-bottom mb-4 nav-isotop-filter">
                        <a class="nav-item nav-link active" href="#" data-filter="*">
                            All
                        </a>
                        @foreach($categories as $category)
                            <a class="nav-item nav-link" href="#" data-filter=".{{ $category->name }}">
                                {{ $category != null ? $category->name :''}}
                            </a>
                        @endforeach
                    </ul>
                </div> <!-- END col-12 -->
            </div> <!-- END row-->
            <div class="row isotop-filter">
                @if($albums)
                    @foreach($albums as $album)
                        <div class="col-lg-2 col-md-3 marginTop-30 {{ $album ? $album->category ? $album->category->name : '':''}}">
                            <div class="media-viewer">
                                <a href="{{ action('FrontController@album',$album->id) }}">
                                    <img class="" src="{{ asset('assets/img/album.png') }}" alt="" width="125"><br>
                                    <a href="{{ action('FrontController@album',$album->id) }}">{{ $album->name }}</a>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>

@stop