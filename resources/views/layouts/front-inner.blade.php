<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Title-->
    <title>@yield('title')</title>

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

    @if(theme() == 1)
        <link rel="stylesheet" href="{{ asset('dist/css/green.css?ver:2.0') }}">
    @elseif(theme() == 2)
        <link rel="stylesheet" href="{{ asset('dist/css/navy.css?ver:1.0') }}">
    @endif

</head>

<body>

{{--<div id="app">--}}

    <header class="site-header bg-dark text-white-0_5 no-print">
            @include('front.inc.info-bar')
{{--        <info-bar></info-bar>--}}
    </header><!-- END site header-->



    <nav class="ec-nav sticky-top bg-white no-print">
{{--        @include('front.inc.menu')--}}
        @include('front.inc.dynamic-menu')
    </nav> <!-- END ec-nav -->

    <div class="site-search no-print">
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




    <footer class="site-footer no-print">
        @include('front.inc.footer-top')
        @include('front.inc.footer-bottom')
    </footer> <!-- END site-footer -->


    <div class="scroll-top no-print">
        <i class="ti-angle-up"></i>
    </div>

{{--    <script src="{{ asset('js/app.js') }}"></script>--}}
    <script src="{{ asset('assets/js/vendors.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.6.347/build/pdf.min.js"></script>

<!-- Pull to refresh -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pulltorefreshjs/0.1.21/index.umd.min.js" integrity="sha512-oEw4xuIi6LVmWze9XMkOUKVrN3l4gIMDrnuci0T3NlcM5tbK9R21ZgP6mqOcit7m41sahXSIG88WOPKgFSWalA==" crossorigin="anonymous"></script>

<script> // Initialize Pull To Refresh
    const ptr = PullToRefresh.init({
        mainElement: 'body',
        onRefresh() {
            window.location.reload();
        }
    });
</script>

    @yield('script')

{{--</div>--}}
</body>
</html>
