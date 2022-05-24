@extends('layouts.fixed')

@section('title','WPIMS | Dashboard')

@section('plugin-css')
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@stop
@section('style')
    <style>
        .statistics, .atten-dtl {
            background-color: #c3cdde;
            margin-top: 50px;
        }

        /*.card-header{*/
        /*height: 77px;*/
        /*padding: 2px 10px;*/
        /*background: #00a65a !important;*/
        /*}*/

        .account{
            background-color: #fff4f3;
            margin-top: 50px;
        }
        .total-rcv{
            background-color: #96abb9;
        }
        .total-pay{
            background-color: #5e6367db;
        }

        .cash-flow{
            background-color: #fff4f3;
            margin-top: 50px;
        }

    </style>
@stop {{--Style--}}

@section('content')
    <!-- Content Header (Page header) -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Welcome</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content-body">
        {{--Section of Statistics Start --}}
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fa fa-graduation-cap"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">STUDENTS</span>
                            <span class="info-box-number">{{ $students }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">TEACHERS</span>
                            <span class="info-box-number">{{ $teachers }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fa fa-university"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">CLASS</span>
                            <span class="info-box-number">{{ $classes }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">OTHERS</span>
                            <span class="info-box-number">2,000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>


            <div class="row">
                {{--Student Attendence Start--}}
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Daily Student Attendence</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-wrench"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a href="#" class="dropdown-item">Action</a>
                                        <a href="#" class="dropdown-item">Another action</a>
                                        <a href="#" class="dropdown-item">Something else here</a>
                                        <a class="dropdown-divider"></a>
                                        <a href="#" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-tool" data-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-center">
                                        <strong>Class Wise Student Attendence</strong>
                                    </p>

                                    <div class="progress-group">
                                        Add Products to Cart
                                        <span class="float-right"><b>160</b>/200</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->

                                    <div class="progress-group">
                                        Complete Purchase
                                        <span class="float-right"><b>310</b>/400</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger" style="width: 75%"></div>
                                        </div>
                                    </div>

                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        <span class="progress-text">Visit Premium Page</span>
                                        <span class="float-right"><b>480</b>/800</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: 60%"></div>
                                        </div>
                                    </div>

                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        Send Inquiries
                                        <span class="float-right"><b>250</b>/500</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-warning" style="width: 50%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                {{--Student Attendence End--}}

                {{--Teacher Attendence Start--}}
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Daily Teacher Attendence</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-wrench"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a href="#" class="dropdown-item">Action</a>
                                        <a href="#" class="dropdown-item">Another action</a>
                                        <a href="#" class="dropdown-item">Something else here</a>
                                        <a class="dropdown-divider"></a>
                                        <a href="#" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-tool" data-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-center">
                                        <strong>Teacher Attendence</strong>
                                    </p>

                                    <div class="progress-group">
                                        Add Products to Cart
                                        <span class="float-right"><b>160</b>/200</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->

                                    <div class="progress-group">
                                        Complete Purchase
                                        <span class="float-right"><b>310</b>/400</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger" style="width: 75%"></div>
                                        </div>
                                    </div>

                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        <span class="progress-text">Visit Premium Page</span>
                                        <span class="float-right"><b>480</b>/800</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: 60%"></div>
                                        </div>
                                    </div>

                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        Send Inquiries
                                        <span class="float-right"><b>250</b>/500</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-warning" style="width: 50%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                {{--Teacher Attendence End--}}
            </div>
            <!-- /.row -->

            <!-- /.row -->
            <div class="row">
                <div class="col-md-8">
                    {{--Class Routin Start--}}
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="ion ion-clipboard mr-1"></i>
                                   Class Routin
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <ul class="todo-list">
                                    <li>
                                        <!-- drag handle -->
                                        <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                                        <!-- checkbox -->
                                        <input type="checkbox" value="" name="">
                                        <!-- todo text -->
                                        <span class="text">Design a nice theme</span>
                                        <!-- Emphasis label -->
                                        <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                                        <!-- General tools such as edit or delete-->
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="far fa-trash-alt"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">Make the theme responsive</span>
                                        <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="far fa-trash-alt"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">Let theme shine like a star</span>
                                        <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="far fa-trash-alt"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">Let theme shine like a star</span>
                                        <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="far fa-trash-alt"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">Check your messages and notifications</span>
                                        <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="far fa-trash-alt"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">Let theme shine like a star</span>
                                        <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="far fa-trash-alt"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    {{--Class Routin Section End--}}
                </div>

                <div class="col-md-4">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 bg-warning">
                        <span class="info-box-icon"><i class="fa fa-male"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Male Student</span>
                            <span class="info-box-number">{{ $studentMale }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-success">
                        <span class="info-box-icon"><i class="fa fa-female"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Female Student</span>
                            <span class="info-box-number">{{ $studentFemale }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-danger">
                        <span class="info-box-icon"><i class="fa fa-mars"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Male Teacher</span>
                            <span class="info-box-number">{{ $teacherMale }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-info">
                        <span class="info-box-icon"><i class="fa fa-venus"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Female Teacher</span>
                            <span class="info-box-number">{{ $teacherFemale }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

            </div>

            <div class="row">
                {{--Academic Calender Section Start--}}
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                Academic Calender
                            </h3>

                            <div class="card-tools">
                                <ul class="pagination pagination-sm">
                                    {{ $calenders->links() }}
                                </ul>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                                @if($calenders->count() > 0)
                                    <table class="table table-condensed">
                                        <thead class="thead-dark text-center">
                                            <tr>
                                                <th>Title</th>
                                                <th>Star</th>
                                                <th>End</th>
                                                <th>Day</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($calenders as $calender)
                                            <tr >
                                                <td>
                                                    {{ $calender->name }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($calender->start)->format('d M') }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($calender->end)->format('d M') }}
                                                </td>
                                                <td>

                                                    @php
                                                        $start = \Carbon\Carbon::parse($calender->start);
                                                        $end = \Carbon\Carbon::parse($calender->end);
                                                        $days = $start->diff($end);
                                                        //echo $days->days;
                                                        //$total +=$days->days;
                                                    @endphp
                                                    <small class="badge badge-primary">
                                                        <i class="far fa-clock"></i> {{ $days->days  }}
                                                    </small>
                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>

                                    </table>

                                @else
                                    <h2>Data Not Found</h2>
                                @endif
                        </div>
                    </div>
                </div>
                {{--Academic Calender Section End--}}

                {{--Academic Notice Board Start--}}
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                Notice Board
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <ul class="todo-list">
                                @if($notices->count() > 0)
                                    @foreach($notices as $notice)
                                        <li>
                                            <!-- drag handle -->
                                            <span class="handle">
                                              <i class="fas fa-ellipsis-v"></i>
                                              <i class="fas fa-ellipsis-v"></i>
                                            </span>

                                            <span class="text">{{ $notice->title }}</span>
                                            <!-- Emphasis label -->
                                            <small class="badge badge-success"><i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($notice->start)->format('d F Y') }}</small>
                                            <!-- General tools such as edit or delete-->
                                            <div class="tools">
                                                <a href="#"><i class="fas fa-eye"></i></a>
                                            </div>
                                </li>
                                    @endforeach
                                @else
                                    <li>
                                         <span class="handle">
                                              <i class="fas fa-ellipsis-v"></i>
                                              <i class="fas fa-ellipsis-v"></i>
                                         </span>
                                        <span class="text"> Notice Data Not Found</span>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
                {{--Academic Notice Board end--}}



            </div>

        </div>

    </div>
    {{--content-body DIV END--}}
@stop

@section('plugin')
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.6.3-web/js/all.min.css') }}">
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="{{ asset('plugins/chartjs-old/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
@stop


@section('script')

    <script>
        $(function () {
            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
//            var areaChartCanvas = $('#areaChart').get(0).getContext('2d');
//            // This will get the first returned node in the jQuery collection.
//            var areaChart       = new Chart(areaChartCanvas);
//
            var areaChartData = {
                labels  : ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [
                    {
                        label               : 'Electronics',
                        fillColor           : 'rgba(210, 214, 222, 1)',
                        strokeColor         : 'rgba(210, 214, 222, 1)',
                        pointColor          : 'rgba(210, 214, 222, 1)',
                        pointStrokeColor    : '#c1c7d1',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data                : [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label               : 'Digital Goods',
                        fillColor           : 'rgba(60,141,188,0.9)',
                        strokeColor         : 'rgba(60,141,188,0.8)',
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };

            var areaChartOptions = {
                //Boolean - If we should show the scale at all
                showScale               : true,
                //Boolean - Whether grid lines are shown across the chart
                scaleShowGridLines      : false,
                //String - Colour of the grid lines
                scaleGridLineColor      : 'rgba(0,0,0,.05)',
                //Number - Width of the grid lines
                scaleGridLineWidth      : 1,
                //Boolean - Whether to show horizontal lines (except X axis)
                scaleShowHorizontalLines: true,
                //Boolean - Whether to show vertical lines (except Y axis)
                scaleShowVerticalLines  : true,
                //Boolean - Whether the line is curved between points
                bezierCurve             : true,
                //Number - Tension of the bezier curve between points
                bezierCurveTension      : 0.3,
                //Boolean - Whether to show a dot for each point
                pointDot                : false,
                //Number - Radius of each point dot in pixels
                pointDotRadius          : 4,
                //Number - Pixel width of point dot stroke
                pointDotStrokeWidth     : 1,
                //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                pointHitDetectionRadius : 20,
                //Boolean - Whether to show a stroke for datasets
                datasetStroke           : true,
                //Number - Pixel width of dataset stroke
                datasetStrokeWidth      : 2,
                //Boolean - Whether to fill the dataset with a color
                datasetFill             : true,
                //String - A legend template
                maintainAspectRatio     : true,
                //Boolean - whether to make the chart responsive to window resizing
                responsive              : true
            };

            //-------------
            //- LINE CHART -
            //--------------
            var lineChartCanvas          = $('#lineChart').get(0).getContext('2d');
            var lineChart                = new Chart(lineChartCanvas);
            var lineChartOptions         = areaChartOptions;
            lineChartOptions.datasetFill = false;
            lineChart.Line(areaChartData, lineChartOptions);

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
            var pieChart       = new Chart(pieChartCanvas);
            var PieData        = [
                {
                    value    : 700,
                    color    : '#f56954',
                    highlight: '#f56954',
                    label    : 'Chrome'
                },
                {
                    value    : 500,
                    color    : '#00a65a',
                    highlight: '#00a65a',
                    label    : 'IE'
                },
                {
                    value    : 400,
                    color    : '#f39c12',
                    highlight: '#f39c12',
                    label    : 'FireFox'
                },
                {
                    value    : 600,
                    color    : '#00c0ef',
                    highlight: '#00c0ef',
                    label    : 'Safari'
                },
                {
                    value    : 300,
                    color    : '#3c8dbc',
                    highlight: '#3c8dbc',
                    label    : 'Opera'
                },
                {
                    value    : 100,
                    color    : '#d2d6de',
                    highlight: '#d2d6de',
                    label    : 'Navigator'
                }
            ];
            var pieOptions     = {
                //Boolean - Whether we should show a stroke on each segment
                segmentShowStroke    : true,
                //String - The colour of each segment stroke
                segmentStrokeColor   : '#fff',
                //Number - The width of each segment stroke
                segmentStrokeWidth   : 2,
                //Number - The percentage of the chart that we cut out of the middle
                percentageInnerCutout: 50, // This is 0 for Pie charts
                //Number - Amount of animation steps
                animationSteps       : 100,
                //String - Animation easing effect
                animationEasing      : 'easeOutBounce',
                //Boolean - Whether we animate the rotation of the Doughnut
                animateRotate        : true,
                //Boolean - Whether we animate scaling the Doughnut from the centre
                animateScale         : false,
                //Boolean - whether to make the chart responsive to window resizing
                responsive           : true,
                // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio  : true};
            pieChart.Doughnut(PieData, pieOptions);


            //pirchart2 start
            var pieChartCanvas = $('#pieChart2').get(0).getContext('2d');
            var pieChart       = new Chart(pieChartCanvas);
            var PieData        = [
                {
                    value    : 700,
                    color    : '#f56954',
                    highlight: '#f56954',
                    label    : 'Chrome'
                },
                {
                    value    : 500,
                    color    : '#00a65a',
                    highlight: '#00a65a',
                    label    : 'IE'
                },
                {
                    value    : 400,
                    color    : '#f39c12',
                    highlight: '#f39c12',
                    label    : 'FireFox'
                },
                {
                    value    : 600,
                    color    : '#00c0ef',
                    highlight: '#00c0ef',
                    label    : 'Safari'
                },
                {
                    value    : 300,
                    color    : '#3c8dbc',
                    highlight: '#3c8dbc',
                    label    : 'Opera'
                },
                {
                    value    : 100,
                    color    : '#d2d6de',
                    highlight: '#d2d6de',
                    label    : 'Navigator'
                }
            ];
            var pieOptions     = {
                //Boolean - Whether we should show a stroke on each segment
                segmentShowStroke    : true,
                //String - The colour of each segment stroke
                segmentStrokeColor   : '#fff',
                //Number - The width of each segment stroke
                segmentStrokeWidth   : 2,
                //Number - The percentage of the chart that we cut out of the middle
                percentageInnerCutout: 50, // This is 0 for Pie charts
                //Number - Amount of animation steps
                animationSteps       : 100,
                //String - Animation easing effect
                animationEasing      : 'easeOutBounce',
                //Boolean - Whether we animate the rotation of the Doughnut
                animateRotate        : true,
                //Boolean - Whether we animate scaling the Doughnut from the centre
                animateScale         : false,
                //Boolean - whether to make the chart responsive to window resizing
                responsive           : true,
                // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio  : true};
            pieChart.Doughnut(PieData, pieOptions);
            //phichar2 end

            //pirchart3 start
            var pieChartCanvas = $('#pieChart3').get(0).getContext('2d');
            var pieChart       = new Chart(pieChartCanvas);
            var PieData        = [
                {
                    value    : 700,
                    color    : '#f56954',
                    highlight: '#f56954',
                    label    : 'Chrome'
                },
                {
                    value    : 500,
                    color    : '#00a65a',
                    highlight: '#00a65a',
                    label    : 'IE'
                },
                {
                    value    : 400,
                    color    : '#f39c12',
                    highlight: '#f39c12',
                    label    : 'FireFox'
                },
                {
                    value    : 600,
                    color    : '#00c0ef',
                    highlight: '#00c0ef',
                    label    : 'Safari'
                },
                {
                    value    : 300,
                    color    : '#3c8dbc',
                    highlight: '#3c8dbc',
                    label    : 'Opera'
                },
                {
                    value    : 100,
                    color    : '#d2d6de',
                    highlight: '#d2d6de',
                    label    : 'Navigator'
                }
            ];
            var pieOptions     = {
                //Boolean - Whether we should show a stroke on each segment
                segmentShowStroke    : true,
                //String - The colour of each segment stroke
                segmentStrokeColor   : '#fff',
                //Number - The width of each segment stroke
                segmentStrokeWidth   : 2,
                //Number - The percentage of the chart that we cut out of the middle
                percentageInnerCutout: 50, // This is 0 for Pie charts
                //Number - Amount of animation steps
                animationSteps       : 100,
                //String - Animation easing effect
                animationEasing      : 'easeOutBounce',
                //Boolean - Whether we animate the rotation of the Doughnut
                animateRotate        : true,
                //Boolean - Whether we animate scaling the Doughnut from the centre
                animateScale         : false,
                //Boolean - whether to make the chart responsive to window resizing
                responsive           : true,
                // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio  : true};
            pieChart.Doughnut(PieData, pieOptions);
            //phichar3 end

            //pirchart3 start
            var pieChartCanvas = $('#pieChart4').get(0).getContext('2d');
            var pieChart       = new Chart(pieChartCanvas);
            var PieData        = [
                {
                    value    : 700,
                    color    : '#f56954',
                    highlight: '#f56954',
                    label    : 'Chrome'
                },
                {
                    value    : 500,
                    color    : '#00a65a',
                    highlight: '#00a65a',
                    label    : 'IE'
                },
                {
                    value    : 400,
                    color    : '#f39c12',
                    highlight: '#f39c12',
                    label    : 'FireFox'
                },
                {
                    value    : 600,
                    color    : '#00c0ef',
                    highlight: '#00c0ef',
                    label    : 'Safari'
                },
                {
                    value    : 300,
                    color    : '#3c8dbc',
                    highlight: '#3c8dbc',
                    label    : 'Opera'
                },
                {
                    value    : 100,
                    color    : '#d2d6de',
                    highlight: '#d2d6de',
                    label    : 'Navigator'
                }
            ];
            var pieOptions     = {
                //Boolean - Whether we should show a stroke on each segment
                segmentShowStroke    : true,
                //String - The colour of each segment stroke
                segmentStrokeColor   : '#fff',
                //Number - The width of each segment stroke
                segmentStrokeWidth   : 2,
                //Number - The percentage of the chart that we cut out of the middle
                percentageInnerCutout: 50, // This is 0 for Pie charts
                //Number - Amount of animation steps
                animationSteps       : 100,
                //String - Animation easing effect
                animationEasing      : 'easeOutBounce',
                //Boolean - Whether we animate the rotation of the Doughnut
                animateRotate        : true,
                //Boolean - Whether we animate scaling the Doughnut from the centre
                animateScale         : false,
                //Boolean - whether to make the chart responsive to window resizing
                responsive           : true,
                // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio  : true};
            pieChart.Doughnut(PieData, pieOptions);
            //phichar3 end


            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas                   = $('#barChart').get(0).getContext('2d');
            var barChart                         = new Chart(barChartCanvas);
            var barChartData                     = areaChartData;
            barChartData.datasets[1].fillColor   = '#00a65a';
            barChartData.datasets[1].strokeColor = '#00a65a';
            barChartData.datasets[1].pointColor  = '#00a65a';
            var barChartOptions                  = {
                //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                scaleBeginAtZero        : true,
                //Boolean - Whether grid lines are shown across the chart
                scaleShowGridLines      : true,
                //String - Colour of the grid lines
                scaleGridLineColor      : 'rgba(0,0,0,.05)',
                //Number - Width of the grid lines
                scaleGridLineWidth      : 1,
                //Boolean - Whether to show horizontal lines (except X axis)
                scaleShowHorizontalLines: true,
                //Boolean - Whether to show vertical lines (except Y axis)
                scaleShowVerticalLines  : true,
                //Boolean - If there is a stroke on each bar
                barShowStroke           : true,
                //Number - Pixel width of the bar stroke
                barStrokeWidth          : 2,
                //Number - Spacing between each of the X value sets
                barValueSpacing         : 5,
                //Number - Spacing between data sets within X values
                barDatasetSpacing       : 1,
                //String - A legend template
                legendTemplate          : '<ul class="%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++)' +
                '{%><li><span style="background-color:%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%>=datasets[i].label%><%}%></li><%}%></ul>',
                //Boolean - whether to make the chart responsive
                responsive              : true,
                maintainAspectRatio     : true
            };

            barChartOptions.datasetFill = false;
            barChart.Bar(barChartData, barChartOptions)
        })
    </script>
@stop
