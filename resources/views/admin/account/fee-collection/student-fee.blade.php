@extends('layouts.fixed')

@section('title','Fee Collection')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Finance</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Location Assign</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if(session()->has('invoice'))

        <script>

          //  $(document).ready(function(){
                var url = '{{ session("invoice") }}';
                window.open(url);
            //});

        </script>
    @endif

    <!-- /.Search-panel -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin: 10px;">
                        <!-- form start -->
                        {{ Form::open(['action'=>'FinanceController@index','role'=>'form','method'=>'get']) }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Student ID</label>
                                    <div class="input-group">
                                        {{ Form::text('studentId',null,['class'=>'form-control','placeholder'=>'Student ID']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Month</label>
                                    <div class="input-group">
                                        {{ Form::selectMonth('month',null,['class'=>'form-control','placeholder'=>'Select Month']) }}
                                    </div>
                                </div>

                                <div class="col-1" style="padding-top: 32px;">
                                    <div class="input-group">
                                        <button  style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.Search-panel -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                    </div>


                {!! Form::open(['url'=>'student/fee-store','method'=>'post']) !!}
                <!-- Main content -->
                    <div class="invoice p-3 mb-3">
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
                                    <strong>{{ $student !=null && $student->name  ? $student->name : '' }}</strong><br>
                                    <b>ID :</b> {{ $student !=null && $student->studentId  ? $student->studentId : '' }}<br>
                                    <b>Class:</b> {{ $student !=null && $student->class_id  ? $student->classes->name : '' }} || <b>Section :</b> {{ $student !=null && $student->section_id  ? $student->section->name : '' }} <br>
                                    Phone: {{ $student !=null && $student->phone  ? $student->phone : '' }}<br>
                                    Email: {{ $student !=null && $student->email  ? $student->email : '' }}
                                </address>
                                {!! Form::hidden('student_id',$student !=null && $student->id  ? $student->id : '' ) !!}
                                {!! Form::hidden('class_id',$student !=null && $student->class_id  ? $student->class_id : '' ) !!}
                                {!! Form::hidden('section_id',$student !=null && $student->section_id  ? $student->section_id : '' ) !!}
                                {!! Form::hidden('group_id',$student !=null && $student->group_id  ? $student->group_id : '' ) !!}
                                {!! Form::hidden('session_id',$student !=null && $student->session_id  ? $student->session_id : '' ) !!}
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col" >

                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Invoice #007612</b><br>
                                <b>Pay Date:</b> {{ \Carbon\Carbon::today()->format('d-m-Y') }} <br>
                                <b>Pay Month:</b> {{ \Carbon\Carbon::createFromDate(null,3,null)->format('F') }}
                            </div>

                        </div>
                        <!-- /.row -->

                        <!-- Table row -->

                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead class="thead-dark">
                                        <tr style="text-align: center">
                                            <th>Sl</th>
                                            <th>Category Name</th>
                                            <th>Description</th>
                                            <th>Setup Amount</th>
                                            <th>Paid Amount</th>
                                        </tr>
                                    </thead>
                                    @php $i=1; $total = $transport_amount = 0; @endphp
                                    <tbody >
                                    @if($fee_setup)
                                        {!! Form::hidden('month', $fee_setup->month) !!}
                                        @foreach($fee_setup->fee_categories  as $fee)
                                            @php
                                                $fee_amount = \App\FeePivot::where('fee_category_id',$fee->id)->where('fee_setup_id',$fee_setup->id)->first()->amount;
                                                $total +=$fee_amount;
                                            @endphp

                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{ucfirst($fee->name)}} {!! Form::hidden('category_id[]', $fee->id) !!}</td>
                                                <td>{{$fee->description}}</td>
                                                <td style="text-align: right">{!! Form::text('setup_amount', $fee_amount ,['class'=>'form-control setup_amount','style'=>'text-align:right','readonly']) !!}</td>
                                                <td >{!! Form::text('amount[]',null,['class'=>'form-control amount','style'=>'text-align:right']) !!}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    <tr>
                                        @if($transport_fee != null)
                                            @php $transport_amount = $transport_fee->location->amount@endphp
                                            <td></td>
                                            <td>Transport Fee</td>
                                            <td><b>Location :</b> {{ucfirst($transport_fee->location->name)}}</td>
                                            <td style="text-align: right">{!! Form::text('setup_transport', $transport_amount ,['class'=>'form-control setup_amount','style'=>'text-align:right','readonly']) !!}</td>
                                            <td>{!! Form::text('transport',null,['class'=>'form-control amount','style'=>'text-align:right']) !!}</td>
                                        @endif
                                    </tr>
                                    <tr>

                                            <td></td>
                                            <td>Paid Due</td>
                                            <td>Paid Previous Due</td>
                                            <td ></td>
                                            <td>{!! Form::text('due_paid',null,['class'=>'form-control amount','style'=>'text-align:right']) !!}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <p class="lead">student payment Details:</p>
                                <table class="table table-responsive-sm table-bordered table-sm" style="font-size: 12px">
                                    <thead class="thead-dark">
                                        <tr style="text-align: center">
                                            <th>Date</th>
                                            <th>Month</th>
                                            <th>Inv. No</th>
                                            <th>Total Amount</th>
                                            <th>Paid Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($payment_details as $payment_detail)
                                           <tr>
                                               <td>{{\Carbon\Carbon::parse($payment_detail->created_at)->format('m M Y')}}</td>
                                               <td style="text-align: center">{{date("F", mktime(0, 0, 0, $payment_detail->month, 1))}}</td>
                                               <td style="text-align: right">{{$payment_detail->id}}</td>
                                               <td style="text-align: right">{{number_format(($payment_detail->setup_amount+$payment_detail->fine+$payment_detail->arrears)-$payment_detail->discount,2)}}</td>
                                               <td style="text-align: right">{{number_format($payment_detail->paid_amount,2)}}</td>
                                           </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                @php
                                   //dd(count($payment_details));
                                    $arrears = count($payment_details) !=0 && $payment_details->last()->due  ? $payment_details->last()->due : 0;
                                @endphp
                                <p class="lead">Amount Calculation</p>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <tr>
                                            <th style="width:50%">Fee Amount:</th>
                                            <td>{!! Form::text('fee_amount', $total+$transport_amount,['class'=>'form-control fee_amount','style'=>'text-align:right','readonly','id'=>'fee_amount']) !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Previous Due </th>
                                            <td>{!! Form::text('arrears', $arrears,['class'=>'form-control previous_due','style'=>'text-align:right','readonly']) !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Discount </th>
                                            <td>{!! Form::text('discount', 0 ,['class'=>'form-control discount','style'=>'text-align:right']) !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Fine:</th>
                                            <td>{!! Form::text('fine', 0 ,['class'=>'form-control fine','style'=>'text-align:right']) !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Sub Total:</th>
                                            <td>{!! Form::text('sub_total', $total+$transport_amount+$arrears ,['class'=>'form-control sub_total','style'=>'text-align:right','readonly']) !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Paid Amount:</th>
                                            <td>{!! Form::text('paid_amount',null,['class'=>'form-control paid_amount','style'=>'text-align:right','id'=>'paid_amount','readonly']) !!}</td>
                                        </tr>
                                        <tr style="background: #ffa37a">
                                            <th>Dues:</th>
                                            <td>{!! Form::text('due', 0 ,['class'=>'form-control due','style'=>'text-align:right','readonly']) !!}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>

                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                {{--<a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>--}}
                                <button type="submit" class="btn btn-success float-right"><i class="fas fa-credit-card"></i> Submit
                                    Payment
                                </button>
                                {{--<button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">--}}
                                {{--<i class="fas fa-download"></i> Generate PDF--}}
                                {{--</button>--}}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
                <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content -->

@stop
@section('script')
    <script>

        $(document).on("keyup",".amount",function(){
            var fee_amount = 0;
            $('.amount').each(function () {
                var data= $(this).val();
                if($.isNumeric(data)){
                    fee_amount +=parseFloat(data)
                }
            });
            //console.log(fee_amount);
            $('#paid_amount').val(fee_amount);
            var sub_total = Number($(".sub_total").val())-fee_amount;
            $(".due").val(sub_total);
        });

        $(document).on('keyup','.discount',function () {
            var fee_amount = parseInt($('#fee_amount').val());
            var previous_due = parseInt($('.previous_due').val());
            var discount = parseInt($(this).val());
            if(isNaN(discount)){
                $('.discount').val(0);
            }
            if(discount > 0){
                var sub_total = (fee_amount+previous_due)-discount;
                //console.log(sub_total);
                $('.sub_total').val(sub_total);
                var paid_amount = $('#paid_amount').val();
                var sub_total = Number($(".sub_total").val())-paid_amount;
                $(".due").val(sub_total);

            }
        });

        $(document).on('keyup','.fine',function () {
            var fee_amount = parseInt($('#fee_amount').val());
            var previous_due = parseInt($('.previous_due').val());
            var discount = parseInt($('.discount').val());
            var fine = parseInt($(this).val());
            if(isNaN(fine)){
                $('.fine').val(0);
            }
            if(fine > 0){
                var sub_total = (fee_amount+previous_due+fine)-discount;
                //console.log(sub_total);
                $('.sub_total').val(sub_total);
                var paid_amount = $('#paid_amount').val();
                var sub_total = Number($(".sub_total").val())-paid_amount;
                $(".due").val(sub_total);
            }

        });


    </script>
@stop
