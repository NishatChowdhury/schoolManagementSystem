@extends('layouts.front-inner')

@section('title','Inner Page')

@section('content')


    <div class="padding-y-60 bg-cover" data-dark-overlay="6" style="background:url(assets/img/breadcrumb-bg.jpg) no-repeat">
        <div class="container">
            <h1 class="text-white">
                Event Details
            </h1>
            <ol class="breadcrumb breadcrumb-double-angle text-white bg-transparent p-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Event</a></li>
                <li class="breadcrumb-item">Event Details</li>
            </ol>
        </div>
    </div>

    <section class="padding-y-60 bg-light">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 mt-4">
                    <div class="card shadow-v1">
                        <div class="position-relative">
                            <img class="card-img-top w-100" src="{{ asset('assets/img/events') }}/{{ $event->image }}" alt="">
                            <div class="position-absolute bottom-0 width-100p bg-primary-0_7 text-center text-white">
                                <ul class="list-inline my-2" data-countdown="2019/01/01">
                                    <li class="list-inline-item iconbox iconbox-xxl bg-white-0_2 my-1">
                                        <h4 class="countdown-days font-size-md-28 mb-0 line-height-reset">226</h4>
                                        <small>Days</small>
                                    </li>
                                    <li class="list-inline-item iconbox iconbox-xxl bg-white-0_2 my-1">
                                        <h4 class="countdown-hours font-size-md-28 mb-0 line-height-reset">12</h4>
                                        <small>Hours</small>
                                    </li>
                                    <li class="list-inline-item iconbox iconbox-xxl bg-white-0_2 my-1">
                                        <h4 class="countdown-minutes font-size-md-28 mb-0 line-height-reset">23</h4>
                                        <small>Minutes</small>
                                    </li>
                                    <li class="list-inline-item iconbox iconbox-xxl bg-white-0_2 my-1">
                                        <h4 class="countdown-seconds font-size-md-28 mb-0 line-height-reset">40</h4>
                                        <small>Second</small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body padding-40">
                            <h2 class="card-title">
                                {{ $event->title }}
                            </h2>
                            <ul class="nav tab-line tab-line border-bottom my-4 text-gray" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" data-toggle="tab" href="#Tabs_1-1" role="tab" aria-selected="true">
                                        Details
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane fade active show" id="Tabs_1-1" role="tabpanel">
                                    {{ $event->details }}
                                </div> <!-- END tab-pane-->

                            </div> <!-- END tab-content-->
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-4">
                    <div class="card shadow-v1">
                        <div class="card-body">
                            <h4 class="mb-2">
                                Event Quick Information
                            </h4>

                            <div class="border-bottom py-3">
                                <div class="media">
                                    <i class="ti-calendar text-primary mt-2"></i>
                                    <div class="media-body ml-3">
                                        <h6 class="my-0">Date</h6>
                                        <span>{{ $event->date->format('F d, Y') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="border-bottom py-3">
                                <div class="media">
                                    <i class="ti-time text-primary mt-2"></i>
                                    <div class="media-body ml-3">
                                        <h6 class="my-0">Time</h6>
                                        <span>{{ $event->time }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="border-bottom py-3">
                                <div class="media">
                                    <i class="ti-location-pin text-primary mt-2"></i>
                                    <div class="media-body ml-3">
                                        <h6 class="my-0">Venue</h6>
                                        <span>{{ $event->venue }}</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>
@stop

@section('script')
    <script>

    </script>
{{--    <script>--}}
{{--        var text=document.getElementById("url").innerText;--}}
{{--        var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;--}}
{{--        var text1=text.replace(exp, "<a href='$1'>$1</a>");--}}
{{--        var exp2 =/(^|[^\/])(www\.[\S]+(\b|$))/gim;--}}
{{--        document.getElementById("url").innerHTML=text1.replace(exp2, '$1<a target="_blank" href="http://$2">$2</a>');--}}
{{--    </script>--}}
@stop
