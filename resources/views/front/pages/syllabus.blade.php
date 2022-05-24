@extends('layouts.front-inner')

@section('title','Syllabus')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>Syllabus</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Institute</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Academics</a>
                        </li>
                        <li class="breadcrumb-item">
                            Syllabus
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="border-bottom bg-light-v2">
        <div class="container">
            <div class="row align-items-center">

                @foreach($syllabuses as $syllabus)
                <div class="col-lg-3 col-md-6 marginTop-30 wow fadeIn">
                    <div class="card text-center height-100p shadow-v1">
                        <div class="card-header">
{{--                            <img class="w-100" src="{{ asset('assets/syllabus') }}/{{ $syllabus->file }}" alt="">--}}
                            <embed src="{{ asset('assets/syllabus') }}/{{ $syllabus->file }}" width="100%" height="100%" />
                        </div>
                        <div class="card-body px-3 py-0">
                            <a href="#" class="h6">{{ $syllabus->title }}</a>
                        </div>
                        <div class="card-footer border-top-0">
                            <a href="{{ asset('assets/syllabus') }}/{{ $syllabus->file }}" class="btn btn-primary mx-1" role="button" target="_blank"><i class="fas fa-eye"></i></a>
                            <a href="{{ asset('assets/syllabus') }}/{{ $syllabus->file }}" class="btn btn-primary mx-1" role="button" target="_blank" download="{{ asset('assets/syllabus') }}/{{ $syllabus->file }}"><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach


            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>

@stop
