<div class="footer-top bg-black-0_9 text-white-0_6 pt-1 pb-1">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-6 mt-5">
                <img src="assets/img/logo-white.png" alt="Logo" width="100">
                <div class="margin-y-40 text-justify">
                    <p>
                        WP-IMS is a latest technology of educational institute’s digitization. This is the fastest and most intelligent application ever made in Bangladesh.
                    </p>
                </div>
            </div>


            <div class="col-lg-4 col-md-6 mt-5">
                <h4 class="h5 text-white">Important links</h4>
                <div class="width-3rem bg-primary height-3 mt-3"></div>
                <ul class="list-unstyled marginTop-40">
                    @foreach(importantLinks() as $link)
                        <li class="mb-2"><a href="{{ $link->link }}">{{ $link->title }}</a></li>
                    @endforeach
                    {{--<li class="mb-2"><a href="page-about.html">About Us</a></li>--}}
                    {{--<li class="mb-2"><a href="page-contact.html">Contact Us</a></li>--}}
                    {{--<li class="mb-2"><a href="page-sp-student-profile.html">Students</a></li>--}}
                    {{--<li class="mb-2"><a href="page-sp-admission-apply.html">Admission</a></li>--}}
                    {{--<li class="mb-2"><a href="page-events.html">Events</a></li>--}}
                    {{--<li class="mb-2"><a href="blog-card.html">Latest News</a></li>--}}
                </ul>

                <ul class="list-inline">
                    <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="{{ socialConfig('facebook') }}" target="_blank"><i class="ti-facebook"> </i></a></li>
                    <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="{{ socialConfig('twitter') }}" target="_blank"><i class="ti-twitter"> </i></a></li>
                    <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="{{ socialConfig('linkendin') }}" target="_blank"><i class="ti-linkedin"> </i></a></li>
                    <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="{{ socialConfig('youtube') }}" target="_blank"><i class="ti-youtube"></i></a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 mt-5">
                <h4 class="h5 text-white">Contact Us</h4>
                <div class="width-3rem bg-primary height-3 mt-3"></div>
                <ul class="list-unstyled marginTop-40">
                    <li class="mb-3"><i class="ti-headphone mr-3"></i><a href="tel:{{ siteConfig('phone') }}">{{ siteConfig('phone') }}</a></li>
                    <li class="mb-3"><i class="ti-email mr-3"></i><a href="mailto:{{ siteConfig('email') }}">{{ siteConfig('email') }}</a></li>
                    <li class="mb-3">
                        <div class="media">
                            <i class="ti-location-pin mt-2 mr-3"></i>
                            <div class="media-body">
                                <span>{{ siteConfig('address') }}</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            {{--<div class="col-lg-4 col-md-6 mt-5">--}}
                {{--<h4 class="h5 text-white">Newslatter</h4>--}}
                {{--<div class="width-3rem bg-primary height-3 mt-3"></div>--}}
                {{--<div class="marginTop-40">--}}
                    {{--<p class="mb-4">Subscribe to get update and information. Don't worry, we won't send spam!</p>--}}
                    {{--<form class="marginTop-30" action="#" method="POST">--}}
                        {{--<div class="input-group">--}}
                            {{--<input type="text" placeholder="Enter your email" class="form-control py-3 border-white" required="">--}}
                            {{--<div class="input-group-append">--}}
                                {{--<button class="btn btn-primary" type="submit">Subscribe</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}

        </div> <!-- END row-->
    </div> <!-- END container-->
</div> <!-- END footer-top-->
