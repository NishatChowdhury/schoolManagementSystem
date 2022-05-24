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
    {{--<link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}">--}}
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

    @yield('style')

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @if(theme() == 1)
        <link rel="stylesheet" href="{{ asset('dist/css/navy.css?ver:1.0') }}">
    @endif

</head>

<body>
<div id="app">
    {{--<nav class="ec-nav bg-white">--}}
    {{--@include('front.inc.header')--}}
    {{--</nav> <!-- END ec-nav -->--}}

    <header class="site-header bg-dark text-white-0_5">
        {{--    @include('front.inc.info-bar')--}}
        <info-bar></info-bar>
        {{--    @include('front.inc.title-bar')--}}
        <title-bar></title-bar>
    </header><!-- END site header-->



    <nav class="ec-nav sticky-top bg-white no-print">
{{--        @include('front.inc.menu')--}}
        @include('front.inc.dynamic-menu')
    </nav> <!-- END ec-nav -->

    {{--<div class="site-search">--}}
    {{--<div class="site-search__close bg-black-0_8"></div>--}}
    {{--<form class="form-site-search" action="#" method="POST">--}}
    {{--<div class="input-group">--}}
    {{--<input type="text" placeholder="Search" class="form-control py-3 border-white" required="">--}}
    {{--<div class="input-group-append">--}}
    {{--<button class="btn btn-primary" type="submit"><i class="ti-search"></i></button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div> <!-- END site-search-->--}}

    @yield('content')


    <footer class="site-footer">
        @include('front.inc.footer-top')
        @include('front.inc.footer-bottom')
    </footer> <!-- END site-footer -->


    <div class="scroll-top">
        <i class="ti-angle-up"></i>
    </div>

</div>

<script src="{{ asset('js/app.js') }}"></script>

<script type="application/javascript" src="{{ asset('assets/js/vendors.bundle.js') }}"></script>
<script type="application/javascript" src="{{ asset('assets/js/scripts.js') }}"></script>


</body>
</html>
