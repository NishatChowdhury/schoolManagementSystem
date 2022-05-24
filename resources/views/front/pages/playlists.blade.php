@extends('layouts.front-inner')

@section('title','Playlists')

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
                            Playlists
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
                    <div class="table-responsive my-4">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" class="font-weight-semiBold">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Videos</th>
                                <th scope="col">Created at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($playlists as $playlist)
                            <tr>
                                <th scope="row" class="font-weight-semiBold">{{ $playlist->id }}</th>
                                <td><a class="btn btn-link" href="{{ action('FrontController@playlist',$playlist->id) }}">{{ $playlist->name }}</a></td>
                                <td>{{ $playlist->videos->count() }}</td>
                                <td>
                                    {{ $playlist->created_at }}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
