    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student Fee | Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4 -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .A4 {
            background: white;
            width: 21cm;
            height: 29.7cm;
            display: block;
            margin: 0 auto;
            padding: 50px 35px;
            margin-bottom: 0.5cm;
            /*box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);*/
            /*overflow-y: scroll;*/
            box-sizing: border-box;
        }

        @media print {
            .page-break {
                display: block;
                page-break-before: always;
            }

            size: A4 portrait;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .A4 {
                box-shadow: none;
                margin: 0;
                width: auto;
                height: auto;
            }

            .noprint {
                display: none;
            }

            .enable-print {
                display: block;
            }
        }
    </style>
</head>
<body onload="window.print();" class="A4">
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-4">
                <h4>
                    <img src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="80">
                    <strong>{{ siteConfig('name') }}</strong><br>
                </h4>
            </div>
            <div class="col-4">

            </div>
            <div class="col-4 callout callout-info">
                <address>
                    {{siteConfig('address')}}<br>
                    Phone: {{siteConfig('phone')}}<br>
                    Email: {{siteConfig('email')}}
                </address>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                Student Details
                <address>
                    <strong>{{ $students !=null && $students->name  ? $students->name : '' }}</strong><br>
                    <b>ID :</b> {{ $students !=null && $students->studentId  ? $students->studentId : '' }}<br>
                    <b>Class:</b> {{ $students !=null && $students->class_id  ? $students->classes->name : '' }} || <b>Section :</b> {{ $students !=null && $students->section_id  ? $students->section->name : '' }} <br>
                    Phone: {{ $students !=null && $students->phone  ? $students->phone : '' }}<br>
                    Email: {{ $students !=null && $students->email  ? $students->email : '' }}
                </address>
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-sm-4 invoice-col" >

            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Invoice #{{$student_id->id}}</b><br>
                <b>Pay Date:</b> {{\Carbon\Carbon::parse($student_id->created_at)->format('d F Y')}} <br>
                <b>Pay Month:</b> {{ date("F", mktime(0, 0, 0, $student_id->month, 1)) }}
            </div>

        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                    <tr style="text-align: center; background: silver!important;">
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->fee_categories->name }}</td>
                                <td>{{ $category->fee_categories->description }}</td>
                                <td style="text-align: right">{{ number_format($category->amount,2) }}</td>
                            </tr>
                       @endforeach

                        @if($student_id->transport)
                            <tr>
                                <td> Transport Fee</td>
                                <td> </td>
                                <td style="text-align: right">{{ number_format($student_id->transport, 2) }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
                {{--<p class="lead">Payment Methods:</p>--}}
                {{--<img src="../../dist/img/credit/visa.png" alt="Visa">--}}
                {{--<img src="../../dist/img/credit/mastercard.png" alt="Mastercard">--}}
                {{--<img src="../../dist/img/credit/american-express.png" alt="American Express">--}}
                {{--<img src="../../dist/img/credit/paypal2.png" alt="Paypal">--}}

                {{--<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">--}}
                    {{--Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr--}}
                    {{--jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.--}}
                {{--</p>--}}
            </div>
            <!-- /.col -->
            <div class="col-6">


                <div class="">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Setup Amount : </th>
                            <td style="text-align: right"> {{ number_format($student_id->setup_amount,2) }}</td>
                        </tr>
                        <tr>
                            <th>Previous Due : </th>
                            <td style="text-align: right"> {{ number_format($student_id->arrears, 2) }} </td>
                        </tr>
                        <tr>
                            <th>Discount : </th>
                            <td style="text-align: right">{{ number_format($student_id->discount, 2) }} </td>
                        </tr>
                        <tr>
                            <th>Fine : </th>
                            <td style="text-align: right"> {{ number_format($student_id->fine, 2) }}  </td>
                        </tr>
                        <tr>
                            <th>Paid Amount : </th>
                            <td style="text-align: right"> {{ number_format($student_id->paid_amount, 2) }}  </td>
                        </tr>
                        <tr>
                            <th>Due : </th>
                            <td style="text-align: right"> {{ number_format($student_id->due, 2) }}  </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
