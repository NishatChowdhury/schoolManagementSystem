<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Title-->
    <title>{{ siteConfig('title') }}</title>

    <!-- SEO Meta-->
    <meta name="description" content="IMS software for educational institute">
    <meta name="keywords" content="web point ltd,school,college,ims,software">
    <meta name="author" content="web point ltd">

    <!-- viewport scale-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon/114x114.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/img/favicon/96x96.png') }}">

    <!--Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700%7CWork+Sans:400,500">


    <!-- Icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/themify-icons/css/themify-icons.css') }}">


    <!-- stylesheet-->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/print.css?ver:1.1') }}">

    @yield('style')

    {{--    <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}
    @if(theme() == 1)
        <link rel="stylesheet" href="{{ asset('dist/css/green.css?ver:2.0') }}">
    @elseif(theme() == 2)
        <link rel="stylesheet" href="{{ asset('dist/css/navy.css?ver:1.0') }}">
    @endif

</head>

<body>
{{--<div id="app">--}}
    {{--<nav class="ec-nav bg-white">--}}
    {{--@include('front.inc.header')--}}
    {{--</nav> <!-- END ec-nav -->--}}

    <header class="site-header bg-dark text-white-0_5">
            @include('front.inc.info-bar')
{{--        <info-bar></info-bar>--}}
            @include('front.inc.title-bar')
{{--        <title-bar></title-bar>--}}
    </header><!-- END site header-->

    <nav class="ec-nav sticky-top bg-white no-print">
        {{--    @include('front.inc.menu')--}}
        @include('front.inc.dynamic-menu')
{{--        <menu-bar></menu-bar>--}}
    </nav> <!-- END ec-nav -->

    <div class="site-search">
        <div class="site-search__close bg-black-0_8"></div>
        <form class="form-site-search" action="#" method="POST">
            <div class="input-group">
                <input type="text" placeholder="Search" class="form-control py-3 border-white" required="">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="ti-search"></i></button>
                </div>
            </div>
        </form>
    </div> <!-- END site-search-->

    @yield('content')


    <footer class="site-footer">
        @include('front.inc.footer-top')
        @include('front.inc.footer-bottom')
    </footer> <!-- END site-footer -->


    <div class="scroll-top">
        <i class="ti-angle-up"></i>
    </div>


{{--@if(URL::current() == 'https://bnsck.edu.bd')--}}
{{--    <!-- Modal -->--}}
{{--    <div class="modal fade" id="popupModal" tabindex="-1" aria-labelledby="popupModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered modal-lg">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel">Notice</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <img class="img-fluid" src="https://bnsck.edu.bd/assets/img/sliders/1607323840126093523_281142773336442_6581619394230561706_n.png" alt="">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}

{{--    <script src="{{ asset('js/app.js') }}"></script>--}}
    <script src="{{ asset('assets/js/vendors.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
{{--</div>--}}

<!-- Pull to refresh -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pulltorefreshjs/0.1.21/index.umd.min.js" integrity="sha512-oEw4xuIi6LVmWze9XMkOUKVrN3l4gIMDrnuci0T3NlcM5tbK9R21ZgP6mqOcit7m41sahXSIG88WOPKgFSWalA==" crossorigin="anonymous"></script>

{{--<script>--}}
{{--    //$('#popupModal').modal('show');--}}
{{--</script>--}}

<script>
    const ptr = PullToRefresh.init({
        mainElement: 'body',
        onRefresh() {
            window.location.reload();
        }
    });
</script>

</body>
</html>
