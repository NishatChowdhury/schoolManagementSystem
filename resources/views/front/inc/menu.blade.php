<div class="container-fluid">
    <div class="navbar p-0 navbar-expand-lg">
        {{--<div class="navbar-brand ml-5">--}}
        {{--<a class="logo-default" href="index.html"><img alt="" src="assets/img/logo-black.png"></a>--}}
        {{--<a class="logo-default" href="{{ url('/') }}"><img alt="" src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}" width="75" height="75"></a>--}}
        {{--</div>--}}
        <span aria-expanded="false" class="navbar-toggler ml-auto collapsed" data-target="#ec-nav__collapsible" data-toggle="collapse">
        <div class="hamburger hamburger--spin js-hamburger">
          <div class="hamburger-box">
            <div class="hamburger-inner"></div>
          </div>
        </div>
      </span>
        <div class="collapse navbar-collapse when-collapsed" id="ec-nav__collapsible">
            <ul class="nav navbar-nav ec-nav__navbar ml-auto">
                <li class="nav-item nav-item__has-megamenu megamenu-col-2">
                    <a class="nav-link" href="{{action('FrontController@index')}}" >Home</a>
                </li>
                <li class="nav-item nav-item__has-dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Institute</a>
                    <div class="dropdown-menu">
                        <ul class="list-unstyled">

                            <li class="nav-item__has-dropdown">
                                <a class="nav-link__list dropdown-toggle" href="#" data-toggle="dropdown"> About Institute </a>
                                <div class="dropdown-menu">
                                    <ul class="list-unstyled">
                                        <li><a class="nav-link__list" href="{{ url('introduction') }}"> Introduction </a></li>
                                        <li><a class="nav-link__list" href="{{action('FrontController@governing_body')}}"> Governing Body</a></li>
                                        <li><a class="nav-link__list" href="{{action('FrontController@donor')}}"> Founder & Donor</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item__has-dropdown">
                                <a class="nav-link__list dropdown-toggle" href="#" data-toggle="dropdown"> Administrative Message </a>
                                <div class="dropdown-menu">
                                    <ul class="list-unstyled">
                                        <li><a class="nav-link__list" href="{{ action('FrontController@president') }}"> President Message </a></li>
                                        <li><a class="nav-link__list" href="{{ action('FrontController@principal') }}"> Principal Message</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item__has-dropdown">
                                <a class="nav-link__list dropdown-toggle" href="#" data-toggle="dropdown"> Infrastructure </a>
                                <div class="dropdown-menu">
                                    <ul class="list-unstyled">
                                        <li><a class="nav-link__list" href="{{action('FrontController@building_room')}}"> Building & Rooms </a></li>
                                        <li><a class="nav-link__list" href="{{action('FrontController@library')}}"> Library</a></li>
                                        <li><a class="nav-link__list" href="{{action('FrontController@transport')}}"> Transport</a></li>
                                        <li><a class="nav-link__list" href="{{action('FrontController@hostel')}}"> Hostel</a></li>
                                        <li><a class="nav-link__list" href="{{ action('FrontController@land_information') }}"> Land Information</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item__has-dropdown">
                                <a class="nav-link__list dropdown-toggle" href="#" data-toggle="dropdown"> Academics </a>
                                <div class="dropdown-menu">
                                    <ul class="list-unstyled">
                                        <li><a class="nav-link__list" href="{{action('FrontController@class_routine')}}"> Class Routine </a></li>
                                        <li><a class="nav-link__list" href="{{action('FrontController@calender')}}">Academic Calender</a></li>
                                        <li><a class="nav-link__list" href="{{action('FrontController@syllabus')}}"> Syllabus</a></li>
                                        <li><a class="nav-link__list" href="{{ action('FrontController@diary') }}"> Diary</a></li>
                                        <li><a class="nav-link__list" href="{{action('FrontController@performance')}}"> Performance</a></li>
                                        <li><a class="nav-link__list" href="{{ action('FrontController@holiday') }}"> Annual Holiday List</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item__has-dropdown">
                                <a class="nav-link__list dropdown-toggle" href="#" data-toggle="dropdown"> Digital Campus </a>
                                <div class="dropdown-menu">
                                    <ul class="list-unstyled">
                                        <li><a class="nav-link__list" href="{{ action('FrontController@multimedia_classroom') }}"> Multimedia Class Room </a></li>
                                        <li><a class="nav-link__list" href="{{ action('FrontController@computer_lab') }}"> Computer Lab </a></li>
                                        <li><a class="nav-link__list" href="{{ action('FrontController@science_lab') }}"> Science Lab </a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item nav-item__has-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Team</a>
                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li><a class="nav-link__list" href="{{action('FrontController@managing_committee')}}">Managing Committee</a></li>
                            <li><a class="nav-link__list" href="{{action('FrontController@teacher')}}">Teachers</a></li>
                            <li><a class="nav-link__list" href="{{action('FrontController@staff')}}">Staffs</a></li>
                            <li><a class="nav-link__list" href="{{ action('FrontController@wapc') }}">Women Abuse Prevention Committee(WAPC)</a></li>
                            <li><a class="nav-link__list" href="{{ action('FrontController@tswt') }}">Teacher & Staff Welfare Trust</a></li>
                            <li><a class="nav-link__list" href="{{ action('FrontController@tci') }}">Teachers Council Information</a></li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item nav-item__has-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Result</a>
                    <div class="dropdown-menu left-auto p-2 p-md-4">
                        <ul class="list-unstyled">
                            <li><a class="nav-link__list px-0" href="{{action('FrontController@internal_exam')}}">Internal Result</a></li>
                            <li><a class="nav-link__list px-0" href="{{action('FrontController@public_exam')}}">Public Examination</a></li>
                            <li><a class="nav-link__list px-0" href="{{action('FrontController@admission')}}">Online Admission</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item nav-item__has-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Information</a>
                    <div class="dropdown-menu left-auto p-2 p-md-4">
                        <ul class="list-unstyled">
                            <li><a class="nav-link__list px-0" href="{{ action('FrontController@sports_n_culture_program') }}">Sports & Cultural Program </a></li>
                            <li><a class="nav-link__list px-0" href="{{ action('FrontController@center_information') }}"> Centre Information </a></li>
                            <li><a class="nav-link__list px-0" href="{{ action('FrontController@scholarship_info') }}"> Scholarship Info</a></li>
                            <li><a class="nav-link__list px-0" href="{{ action('FrontController@bncc') }}"> BNCC Info </a></li>
                            <li><a class="nav-link__list px-0" href="{{ action('FrontController@scout') }}"> Rover Scouts </a></li>
                            <li><a class="nav-link__list px-0" href="{{ action('FrontController@tender') }}"> Tender </a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item nav-item__has-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Attendance</a>
                    <div class="dropdown-menu left-auto p-2 p-md-4">
                        <ul class="list-unstyled">
                            <li><a class="nav-link__list px-0" href="{{action('FrontController@attendance_summery')}}">Summery</a></li>
                            <li><a class="nav-link__list px-0" href="{{action('FrontController@student_attendance')}}">Students</a></li>
                            <li><a class="nav-link__list px-0" href="{{action('FrontController@teacher_attendance')}}">Teachers & Staffs</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item nav-item__has-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">News & Notice</a>
                    <div class="dropdown-menu left-auto p-2 p-md-4">
                        <ul class="list-unstyled">
                            <li><a class="nav-link__list px-0" href="{{action('FrontController@notice')}}">Notice</a></li>
                            <li><a class="nav-link__list px-0" href="{{action('FrontController@news')}}">News</a></li>
                        </ul>

                    </div>
                </li>
                <li class="nav-item nav-item__has-dropdown">
                    <a class="nav-link no-caret" href="{{ action('FrontController@gallery') }}">Gallery</a>
                </li>

                <li class="nav-item nav-item__has-dropdown">
                    <a class="nav-link no-caret" href="{{ action('FrontController@download') }}">Download</a>
                </li>

                <li class="nav-item nav-item__has-dropdown">
                    <a class="nav-link no-caret" href="{{ action('FrontController@contact') }}">Contacts</a>
                </li>

            </ul>
        </div>

    </div>
</div> <!-- END container-->
