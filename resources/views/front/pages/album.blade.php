@extends('layouts.front-inner')

@section('title',$album->name)

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
                            <a href="{{ url('gallery') }}"> Gallery</a>
                        </li>
                        <li class="breadcrumb-item">
                            {{ $album->name }}
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
                    {{--<ul class="nav tab-line tab-line--2x border-bottom mb-4 nav-isotop-filter">--}}
                        {{--<a class="nav-item nav-link active" href="#" data-filter="*">--}}
                            {{--All--}}
                        {{--</a>--}}
                        {{--<a class="nav-item nav-link" href="#" data-filter=".creative">--}}
                            {{--Creative--}}
                        {{--</a>--}}
                        {{--<a class="nav-item nav-link" href="#" data-filter=".corporate">--}}
                            {{--Corporate--}}
                        {{--</a>--}}
                        {{--<a class="nav-item nav-link" href="#" data-filter=".ui-ux">--}}
                            {{--UI/UX--}}
                        {{--</a>--}}
                        {{--<a class="nav-item nav-link" href="#" data-filter=".web-design">--}}
                            {{--Web Design--}}
                        {{--</a>--}}
                    {{--</ul>--}}
                </div> <!-- END col-12 -->
            </div> <!-- END row-->
            <div class="row isotop-filter">
                @foreach($images as $image)
                    <div class="col-lg-4 col-md-6 marginTop-30">
                        <div class="media-viewer">
                            <img class="media-viewer__media" src="{{ asset('assets/img/gallery/') }}/{{ $image->album_id }}/{{ $image->image }}" alt="">
                            <div class="media-viewer__overlay bg-black-0_7 flex-center">
                                <a href="{{ asset('assets/img/gallery/') }}/{{ $image->album_id }}/{{ $image->image }}" class="iconbox bg-white" data-fancybox="gallery">
                                    <i class="ti-search"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>

@stop

@section('script')
    <script src="{{ asset('assets/vendor/fancybox-master/dist/jquery.fancybox.min.js') }}"></script>
@stop