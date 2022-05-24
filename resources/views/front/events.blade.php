
<section class="padding-y-100" data-primary-overlay="7" style="background:url(assets/img/1920/962.jpg) no-repeat">
    <div class="container">
        <div class="row">

            <div class="col-12 text-center text-white mb-md-4">
                <h2 class="mb-4">
                    Upcoming Events
                </h2>
                <div class="width-3rem height-4 rounded bg-white mx-auto"></div>
            </div>

            @foreach($events as $event)
            <div class="col-md-4 mt-4">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('assets/img/events/') }}/{{ $event->image }}" alt="">
                    <div class="card-body">
                        <h4 class="h5">
                            {{ $event->title }}
                        </h4>
                        <ul class="list-unstyled my-4 line-height-xl">
                            <li>
                                <i class="ti-time mr-2 text-primary"></i>
                                {{ $event->date->format('F d, Y') }} @ {{ $event->time }}
                            </li>
                            <li>
                                <i class="ti-location-pin mr-2 text-primary"></i>
                                {{ $event->venue }}
                            </li>
                        </ul>
                        <a href="{{ action('FrontController@event',$event->id) }}" class="text-primary">
                            View Details
                            <i class="ti-angle-double-right small"></i>
                        </a>
                    </div>
                </div>
            </div> <!-- END col-md-4-->
            @endforeach

{{--            <div class="col-md-4 mt-4">--}}
{{--                <div class="card">--}}
{{--                    <img class="card-img-top" src="assets/img/360x220/2.jpg" alt="">--}}
{{--                    <div class="card-body">--}}
{{--                        <h4 class="h5">--}}
{{--                            Farmer's Market at Harvard, Collins Street--}}
{{--                        </h4>--}}
{{--                        <ul class="list-unstyled my-4 line-height-xl">--}}
{{--                            <li>--}}
{{--                                <i class="ti-time mr-2 text-primary"></i>--}}
{{--                                April 13, 2018 @ 8:00 am--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <i class="ti-location-pin mr-2 text-primary"></i>--}}
{{--                                184 Main Collins Street--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <a href="#" class="text-primary">--}}
{{--                            View Details--}}
{{--                            <i class="ti-angle-double-right small"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div> <!-- END col-md-4-->--}}

{{--            <div class="col-md-4 mt-4">--}}
{{--                <div class="card">--}}
{{--                    <img class="card-img-top" src="assets/img/360x220/3.jpg" alt="">--}}
{{--                    <div class="card-body">--}}
{{--                        <h4 class="h5">--}}
{{--                            A Conversation with Wynton Marsalis--}}
{{--                        </h4>--}}
{{--                        <ul class="list-unstyled my-4 line-height-xl">--}}
{{--                            <li>--}}
{{--                                <i class="ti-time mr-2 text-primary"></i>--}}
{{--                                April 13, 2018 @ 8:00 am--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <i class="ti-location-pin mr-2 text-primary"></i>--}}
{{--                                184 Main Collins Street--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <a href="#" class="text-primary">--}}
{{--                            View Details--}}
{{--                            <i class="ti-angle-double-right small"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div> <!-- END col-md-4-->--}}
            <div class="col-12 mt-5 text-center">
                <a href="{{ action('FrontController@events') }}" class="btn btn-outline-white-hover">More Events</a>
            </div>
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>
