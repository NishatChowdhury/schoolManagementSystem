@extends('layouts.fixed')

@section('title','View Report')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
                <div class="col-md-12">
                    <h3 style="background-color:rgb(45 136 151);color:white;padding:10px;text-align:center "><b>View report for:  {{ $student->studentId }}</b></h3>
                </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info no-print">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        This page has been enhanced for printing. Click the print button to print the report.
                    </div>
                    <div class="form-group no-print" style="padding:10px; margin: auto;text-align:right" >
                        <button class="btn btn-success" onclick="window.print(); return false;">Print</button>
                    </div>

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
                                <h5>Student Details</h5>
                                <hr>
                                <address>
                                    <strong>{{ $student !=null && $student->name  ? $student->name : '' }}</strong><br>
                                    <b>ID :</b> {{ $student !=null && $student->studentId  ? $student->studentId : '' }}<br>
                                    <b>Class:</b> {{ $student !=null && $student->class_id  ? $student->classes->name : '' }} || <b>Section :</b> {{ $student !=null && $student->section_id  ? $student->section->name : '' }} <br>
                                    Phone: {{ $student !=null && $student->mobile  ? $student->mobile : '' }}<br>
                                    Email: {{ $student !=null && $student->email  ? $student->email : '' }}
                                </address>
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
                                        </tr>
                                    </thead>
                                    <tbody >
                                    @if($fee_setup)
                                        @foreach($fee_setup->fee_categories  as $key=>$fee)
                                            @php
                                                $fee_amount = \App\FeeSetupPivot::where('fee_category_id',$fee->id)->where('fee_setup_id',$fee_setup->id)->first()->amount;
                                            @endphp

                                            <tr>
                                                <td style="text-align: center">{{$key}}</td>
                                                <td style="text-align: center">{{ucfirst($fee->name)}}</td>
                                                <td style="text-align: center">{{$fee->description}}</td>
                                                <td style="text-align: center">{!! Form::text('setup_amount', number_format($fee_amount,2 ),['class'=>'form-control setup_amount','style'=>'text-align:center','readonly']) !!}</td>
                                            </tr>
                                            
                                        @endforeach
                                    @endif
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align: center">{{ __('Total Amount:') }}</td>
                                        <td style="text-align:center"> {{ number_format($fee_setup->feeSetupPivot->sum('amount'),2) }} </td>
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
                                <p class="lead">Student payment Details:</p>
                                <table class="table table-responsive-sm table-bordered table-sm" style="font-size: 12px">
                                    <thead class="thead-dark">
                                        <tr style="text-align: center">
                                            <th>Last Payment Date</th>
                                            <th>Inv. No</th>
                                            <th>Total Amount</th>
                                            <th>Paid Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($payment_details as $payment_detail)
                                           <tr>
                                               <td style="text-align: center">{{\Carbon\Carbon::parse($payment_detail->created_at)->format('d M Y')}}</td>
                                               <td style="text-align: center">{{$payment_detail->id}}</td>
                                               <td style="text-align: center">{{number_format($fee_setup->feeSetupPivot->sum('amount'))}}</td>
                                               <td style="text-align: center">{{number_format($payment_detail->paid_amount,2)}}</td>
                                           </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Summary:</p>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <tr>
                                            
                                            <th style="width:50%">Fee Amount:</th>
                                            <td>{!! Form::text('amount',number_format($fee_setup->feeSetupPivot->sum('amount'),2),['class'=>'form-control fee_amount','style'=>'text-align:right','readonly','id'=>'fee_amount']) !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Previous Balance / Due </th>
                                            @foreach ($payment_details as $payment_detail)
                                                <td>{!! Form::text('balance', number_format($payment_detail->balance,2) ,['class'=>'form-control discount','style'=>'text-align:right','readonly']) !!}</td>
                                            
                                        </tr>
                                        @php
                                            $sub_total = number_format($fee_setup->feeSetupPivot->sum('amount')+$payment_detail->balance,2);
                                        @endphp
                                        <tr>
                                            <th>Sub Total:</th>
                                            <td>{!! Form::text('sub_total', $sub_total ,['class'=>'form-control sub_total','style'=>'text-align:right','readonly']) !!}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Paid Amount:</th>
                                            <td>{!! Form::text('paid_amount',number_format($payment_detail->paid_amount,2),['class'=>'form-control paid_amount','style'=>'text-align:right','id'=>'paid_amount','readonly']) !!}</td>
                                        </tr>
                                        @endforeach
                                        @php
                                            $sub_total = $fee_setup->feeSetupPivot->sum('amount') + $payment_detail->balance;
                                            $paid_amount = $payment_detail->paid_amount;
                                            $due = $sub_total - $paid_amount;
                                        @endphp
                                        @if ($sub_total > $paid_amount)
                                            <tr style="background: #ffa37a">
                                                <th>Dues:</th>
                                                <td>{!! Form::text('due', number_format($due,2) ,['class'=>'form-control due','style'=>'text-align:right','readonly']) !!}</td>
                                            </tr>
                                        
                                        @elseif ($sub_total = $paid_amount)
                                            <tr style="background: #ffa37a">
                                                <th>Dues:</th>
                                                <td>{!! Form::text('due', 0 ,['class'=>'form-control due','style'=>'text-align:right','readonly']) !!}</td>
                                            </tr>
                                        @endif
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>

                        <!-- /.row -->

                    </div>
                <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>





@stop