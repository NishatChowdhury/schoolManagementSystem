<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.6.3-web/css/all.min.css') }}">
    <!-- Nano Scroller -->
    <link rel="stylesheet" href="{{ asset('plugins/nanoScroller/nanoscroller.css') }}">
{{--    select2--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}
    <!-- Ionicons -->
{{--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">--}}
    <!-- w3school switch -->
    <link rel="stylesheet" href="{{ asset('plugins/w3school-switch/w3school-switch.css') }}">

    @yield('plugin-css')

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css?ver:1.2') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/print.css?ver:1.6') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Google Font: Source Sans Pro -->
{{--    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">--}}
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
{{--    @livewireStyles--}}
{{--    <livewire:styles />--}}
    @yield('style')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        @include('admin.includes.header')
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        @include('admin.includes.left-sidebar')
    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    {{--<footer class="main-footer">--}}
        {{--@include('includes.footer')--}}
    {{--</footer>--}}

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        @include('admin.includes.right-aside')
    </aside>
    <!-- /.control-sidebar -->

    <footer class="main-footer">
        @include('admin.includes.footer')
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
{{--<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
{{--select2--}}
{{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
<!-- Form Awesome -->
{{--<script src="{{ asset('plugins/fontawesome-free-5.6.3-web/js/all.min.js') }}"></script>--}}

<!-- Nano Scroller -->
{{--<script src="{{ asset('plugins/nanoScroller/jquery.nanoscroller.min.js') }}"></script>--}}
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>

@yield('plugin')

@yield('script')
{{--<script src="{{ asset('vendor/livewire/livewire.js') }}"></script>--}}

{{--@livewireScripts--}}
<script>
   /* $(".nano").nanoScroller({
        preventPageScrolling: true,
    });*/
</script>

</body>
</html>
