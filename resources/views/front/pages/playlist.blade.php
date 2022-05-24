@extends('layouts.front-inner')

@section('title','Inner Page')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>{{ $playlist->name }}</h2>
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
                    @foreach($playlist->videos as $video)
                    <div class="col-lg-6 mt-5">
                        {!! $video->code !!}
                    </div>
                    @endforeach
            </div>
        </div>
    </section>
@stop
