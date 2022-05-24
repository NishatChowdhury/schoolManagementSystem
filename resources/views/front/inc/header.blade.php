<div class="container">
    <div class="navbar p-0 navbar-expand-lg">
        <div class="navbar-brand">
            <div class="row">
                <div class="col-2 hdr">
                    <a class="logo-default" href="{{ url('/') }}"><img alt="" src="assets/img/logo-only.jpg"></a>
                </div>
                <div class="col-10 hdr">
                    <p style="font-size:28px;font-weight:bold">CHIPATALI  JAMIA GAUSIA MUINIA KAMIL (M.A) MADRASHAH</p>
                    <p style="font-size:28px;font-weight:bold">ছিপাতলী জামেয়া গাউছিয়া মূঈনীয়া কামিল (এম. এ) মাদ্রাসা</p>
                </div>
            </div>
        </div>
        <span aria-expanded="false" class="navbar-toggler ml-auto collapsed" data-target="#ec-nav__collapsible" data-toggle="collapse">
        <div class="hamburger hamburger--spin js-hamburger">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
        </span>
        <div class="collapse navbar-collapse when-collapsed" id="ec-nav__collapsible">
            {{--<ul class="nav navbar-nav ec-nav__navbar ml-auto">--}}

                {{--<li class="nav-item nav-item__has-megamenu megamenu-col-2">--}}
                    {{--<a class="nav-link dropdown-toggle no-caret" href="#" data-toggle="dropdown">Home</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item nav-item__has-dropdown">--}}
                    {{--<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Institute</a>--}}
                    {{--<div class="dropdown-menu">--}}
                        {{--<ul class="list-unstyled">--}}

                            {{--<li class="nav-item__has-dropdown">--}}
                                {{--<a class="nav-link__list dropdown-toggle" href="#" data-toggle="dropdown"> About Institute </a>--}}
                                {{--<div class="dropdown-menu">--}}
                                    {{--<ul class="list-unstyled">--}}
                                        {{--<li><a class="nav-link__list" href="page-events.html"> Introduction </a></li>--}}
                                        {{--<li><a class="nav-link__list" href="page-event-details.html"> Governing Body</a></li>--}}
                                        {{--<li><a class="nav-link__list" href="page-event-details.html"> Founder & Donor</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</li>--}}

                            {{--<li class="nav-item__has-dropdown">--}}
                                {{--<a class="nav-link__list dropdown-toggle" href="#" data-toggle="dropdown"> Administrative Message </a>--}}
                                {{--<div class="dropdown-menu">--}}
                                    {{--<ul class="list-unstyled">--}}
                                        {{--<li><a class="nav-link__list" href="page-help-&-support.html"> President Message </a></li>--}}
                                        {{--<li><a class="nav-link__list" href="page-help-&-support-topics.html"> Principal Message</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</li>--}}

                            {{--<li class="nav-item__has-dropdown">--}}
                                {{--<a class="nav-link__list dropdown-toggle" href="#" data-toggle="dropdown"> Infrastructure </a>--}}
                                {{--<div class="dropdown-menu">--}}
                                    {{--<ul class="list-unstyled">--}}
                                        {{--<li><a class="nav-link__list" href="page-login.html"> Building & Rooms </a></li>--}}
                                        {{--<li><a class="nav-link__list" href="page-signup.html"> Library</a></li>--}}
                                        {{--<li><a class="nav-link__list" href="page-recover-password.html"> Transport</a></li>--}}
                                        {{--<li><a class="nav-link__list" href="page-sp-student-profile.html"> Hotel</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</li>--}}

                            {{--<li class="nav-item__has-dropdown">--}}
                                {{--<a class="nav-link__list dropdown-toggle" href="#" data-toggle="dropdown"> Academics </a>--}}
                                {{--<div class="dropdown-menu">--}}
                                    {{--<ul class="list-unstyled">--}}
                                        {{--<li><a class="nav-link__list" href="page-notice.html"> Class Routine </a></li>--}}
                                        {{--<li><a class="nav-link__list" href="page-notice-details.html"> Calender</a></li>--}}
                                        {{--<li><a class="nav-link__list" href="page-notice-details.html"> Syllabus</a></li>--}}
                                        {{--<li><a class="nav-link__list" href="page-notice-details.html"> Performance</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li class="nav-item nav-item__has-dropdown">--}}
                    {{--<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Team</a>--}}
                    {{--<div class="dropdown-menu">--}}
                        {{--<ul class="list-unstyled">--}}
                            {{--<li><a class="nav-link__list" href="index-school-default.html">Managing Committee</a></li>--}}
                            {{--<li><a class="nav-link__list" href="index-school-online.html">Teachers</a></li>--}}
                            {{--<li><a class="nav-link__list" href="index-college.html">Staffs</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li class="nav-item nav-item__has-dropdown">--}}
                    {{--<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Result</a>--}}
                    {{--<div class="dropdown-menu left-auto p-2 p-md-4">--}}
                        {{--<ul class="list-unstyled">--}}
                            {{--<li><a class="nav-link__list px-0" href="index-school-default.html">Internal</a></li>--}}
                            {{--<li><a class="nav-link__list px-0" href="index-school-online.html">Public Examination</a></li>--}}
                            {{--<li><a class="nav-link__list px-0" href="index-college.html">Admission</a></li>--}}
                        {{--</ul>--}}

                    {{--</div>--}}
                {{--</li>--}}
                {{--<li class="nav-item nav-item__has-dropdown">--}}
                    {{--<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Attendance</a>--}}
                    {{--<div class="dropdown-menu left-auto p-2 p-md-4">--}}
                        {{--<ul class="list-unstyled">--}}
                            {{--<li><a class="nav-link__list px-0" href="index-school-default.html">Summery</a></li>--}}
                            {{--<li><a class="nav-link__list px-0" href="index-school-online.html">Student</a></li>--}}
                            {{--<li><a class="nav-link__list px-0" href="index-college.html">Teacher</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li class="nav-item nav-item__has-dropdown">--}}
                    {{--<a class="nav-link dropdown-toggle no-caret" href="#" data-toggle="dropdown">Gallery</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item nav-item__has-dropdown">--}}
                    {{--<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">News & Notice</a>--}}
                    {{--<div class="dropdown-menu left-auto p-2 p-md-4">--}}
                        {{--<ul class="list-unstyled">--}}
                            {{--<li><a class="nav-link__list px-0" href="index-school-default.html">Notice</a></li>--}}
                            {{--<li><a class="nav-link__list px-0" href="index-school-online.html">News</a></li>--}}
                        {{--</ul>--}}

                    {{--</div>--}}
                {{--</li>--}}
            {{--</ul>--}}
        </div>

    </div>
</div> <!-- END container-->