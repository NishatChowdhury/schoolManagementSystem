@extends('layouts.fixed')

@section('title','Attendance  | Dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Attendance Dashboard </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Attendance Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main chart -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <!-- DONUT CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Student Attendance <br> Month : {{ $month_name }}</h4>
                            <h6>
                                <span class="badge badge-warning" style="padding: 5px">Date : {{ $today_date }} </span> || <span class="badge badge-success" style="color: black; padding: 5px">present : {{ $total_attendance }}</span> || <span class="badge badge-danger" style="color: black; padding: 5px">Absent : {{ $total_absents }}</span> || <span class="badge badge-info" style="color: black; padding: 5px">Total Students : {{ $total_student }}</span>
                            </h6>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChart" style="height:250px"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->



                </div>
                <div class="col-md-4">
                    <!-- DONUT CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Teacher Attendance <br> Month : {{ $month_name }} </h3>
                            <h6>
                                <span class="badge badge-warning" style="padding: 5px">Date : {{ $today_date }} </span> || <span class="badge badge-success" style="color: black; padding: 5px">present : {{ $total_attendance_teacher }}</span> || <span class="badge badge-danger" style="color: black; padding: 5px">Absent : {{ $total_absents_teacher }}</span> || <span class="badge badge-info" style="color: black; padding: 5px">Total Teachers : {{ $total_teacher }}</span>
                            </h6>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChart3" style="height:250px"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->



                </div>
                <div class="col-md-4">
                    <!-- DONUT CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Attendance Notification <br> {{ $month_name }}</h3>
                            <h6>10000</h6>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChart2" style="height:250px"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->



                </div>

            </div>
            <!-- /.row -->
            {{--student bar chart start--}}
            <div class="row">
                <!-- /.col (LEFT) -->
                <div class="col-md-12">
                    <!-- BAR CHART -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Student Attendance</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="barChart" style="height:230px;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col (RIGHT) -->
            </div>
        </div>
        {{--student bar chart end--}}

        {{--teacher bar chart start--}}
        <div class="row">
            <!-- /.col (LEFT) -->
            <div class="col-md-12">
                <!-- BAR CHART -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Teacher Attendance</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart1" style="height:230px"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col (RIGHT) -->
        </div>
    {{--teacher bar chart end--}}
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Main content Teacher table -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-chalkboard-teacher"></i> Teacher Attendance</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Day</th>
                                <th>Status</th>
                                <th>Present</th>
                                <th>Late</th>
                                <th>Left Early</th>
                                <th>Absent</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>----</td>
                                <td>----</td>
                                <td>----</td>
                                <td>----</td>
                                <td>----</td>
                                <td>----</td>
                                <td>----</td>
                                <td>----</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    {{--Main content Student table --}}
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-user-graduate"></i> Student Attendance</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Class</th>
                                <th>Date</th>
                                <th>Day</th>
                                <th>Status</th>
                                <th>Present</th>
                                <th>Absent</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($class_attendances != null)
                                    @foreach($class_attendances as $key=>$info)
                                        <tr>
                                            <td>{{ $info->name}}</td>
                                            <td class="text-center">{{date('d-M-Y')}}</td>
                                            <td class="text-center">{{date('l')}}</td>
                                            <td class="text-center">{{'--'}}</td>
                                            <td class="text-center">{{$info->totalScan}}</td>
                                            <td class="text-center">{{'--'}}</td>
                                            <td class="text-center">{{'--'}}</td>

                                        </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7" style="text-align: center; color: #7b9726; font-size: 20px">{{'CARD NOT PUNCH TODAY'}}</td>
                                    </tr>
                                @endif

                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->


@stop

@section('plugin')
    <!-- ChartJS 1.0.1 -->
    <script src="{{ asset('plugins/chartjs-old/Chart.min.js') }}"></script>
@stop

@section('script')

    <script>
        $(function () {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
//            var areaChartCanvas = $('#areaChart').get(0).getContext('2d');
//            // This will get the first returned node in the jQuery collection.
//            var areaChart       = new Chart(areaChartCanvas);
//
            var areaChartData = {
                labels  : ['January', 'February', 'March', 'April', 'May', 'June','July','August','September','October','November','December'],

                datasets: [
                    {
                        label               : 'Absents',
                        fillColor           : 'rgba(128, 0, 0, 0.7)',
                        strokeColor         : 'rgba(210, 214, 222, 1)',
                        pointColor          : 'rgba(210, 214, 222, 1)',
                        pointStrokeColor    : '#c1c7d1',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data                : [65, 59, 80, 81, 56, 55, 40,50,56,65,25,35]
                    },
                    {
                        label               : 'Presents',
                        fillColor           : 'rgba(60,141,188,0.9)',
                        strokeColor         : 'rgba(60,141,188,0.8)',
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : [28, 48, 40, 19, 86, 27, 90,23,26,65,54,45]
                    }
                ]
            };

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
            var pieChart       = new Chart(pieChartCanvas);

            var PieData        = [
                {
                    value    : '<?= $total_absents ?>',
                    color    : '#f56954',
                    highlight: '#f56954',
                    label    : 'Absents'
                },
                {
                    value    : '<?= $total_attendance ?>',
                    color    : '#00a65a',
                    highlight: '#00a65a',
                    label    : 'Presents'
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
                maintainAspectRatio  : true
            };
            pieChart.Doughnut(PieData, pieOptions);


            //pirchart2 start
            var pieChartCanvas = $('#pieChart3').get(0).getContext('2d');
            var pieChart       = new Chart(pieChartCanvas);
            var PieData        = [
                {
                    value    : '<?= $total_absents_teacher ?>',
                    color    : '#f56954',
                    highlight: '#f56954',
                    label    : 'Absents'
                },
                {
                    value    : '<?= $total_attendance_teacher ?>',
                    color    : '#00a65a',
                    highlight: '#00a65a',
                    label    : 'Presents'
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
            var pieChartCanvas = $('#pieChart2').get(0).getContext('2d');
            var pieChart       = new Chart(pieChartCanvas);
            var PieData        = [
                {
                    value    : 700,
                    color    : '#f56954',
                    highlight: '#f56954',
                    label    : 'Abseent'
                },
                {
                    value    : 500,
                    color    : '#00a65a',
                    highlight: '#00a65a',
                    label    : 'Present'
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
                legendTemplate          : '<ul class="%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions)
  })
  </script>
@stop