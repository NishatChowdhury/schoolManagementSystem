@extends('layouts.front-inner')

@section('title','Online Admission Form')

@section('content')

    {{--    @php $student = \Illuminate\Support\Facades\Session::get('data') @endphp--}}

    <div class="py-5 bg-dark no-print">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>Admission Form</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Result</a>
                        </li>
                        <li class="breadcrumb-item">
                            {{ ucfirst('Admission Form') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-20 border-bottom" style="page-break-after: always">
        <div class="row">
            <span class="origin">Bank Copy</span>
            <div class="col-4" id="part-one">
                <div class="container-fluid inv-header">
                    <div class="row">
                        <div class="col-md-2" style="padding: 0 0 0 15px">
                            <img src="{{ asset('assets/img/logos/'.siteConfig('logo')) }}" alt="{{ siteConfig('name') }}" class="img-fluid">
                        </div>
                        <div class="col-md-10" style="padding: 0">
                            <h4>{{ siteConfig('name') }}</h4>
                            <p>{{ siteConfig('address') }}</p>
                            <p>Email: {{ siteConfig('email') }}</p>
                            <p>Website: {{ url('/') }}</p>
                        </div>
                    </div>
                </div>
                <div class="container-fluid institute-info">
                    <p>Class Roll: <span></span></p>
                    <p>Bank Name: <span class="bank-name">{{ $bank->name }} </span><a href="#" data-toggle="modal" data-target="#bankListModal" title="Change Bank"><i class="fas fa-sync-alt no-print"></i></a></p>
                    <p>Branch Name: <span class="bank-branch">{{ $bank->branch }}</span></p>
                    <p>Account Number: <span class="bank-account-number">{{ $bank->account_number }}</span></p>
                    <p>Student Name: <span>{{ $student['name'] }}</span></p>
                </div>
                <div class="container-fluid class-info">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Class: <span>Eleven</span></p>
                            <p>Session: <span>{{ \App\Session::query()->findOrFail($student['session_id'])->year }}</span></p>
                            <p>Date: <span></span></p>
                        </div>
                        <div class="col-md-6">
                            <p>SID: <span>{{ $student['studentId'] }}</span></p>
                            <p>Group: <span>{{ \App\Group::query()->findOrFail($student['group_id'])->name }}</span></p>
                            <p>Mobile: <span>{{ $student['mobile'] }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="table-responsive">
                        <table class="inv-table">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Fee Category</th>
                                <th class="text-right">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $x = 1 @endphp
                            @foreach($categories as $cat)
                                <tr>
                                    <td>{{ $x++ }}</td>
                                    <td>{{ $cat->category }}</td>
                                    <td class="text-right">{{ number_format($cat->amount,2) }}</td>
                                </tr>
                            @endforeach
                            @if($student->location_id)
                                <tr>
                                    <td>{{ $x++ }}</td>
                                    <td>{{ 'Transport Fee' }}</td>
                                    <td class="text-right">{{ number_format($student->location->amount,2) }}</td>
                                </tr>
                            @endif
{{--                            {{ dd($student->location_id ? $student->location->amount : 0) }}--}}
                            <tr>
                                <th colspan="2" class="text-right">Total</th>
{{--                                <th class="text-right">{{ number_format(array_sum($categories),2) }}</th>--}}
                                <th class="text-right">{{ number_format($categories->sum('amount') + ($student->location_id ? $student->location->amount : 0),2) }}</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <p style="font-size: 12px">In Word: {{ ucwords(inWord($categories->sum('amount') + ($student->location_id ? $student->location->amount : 0))) }} Taka Only.</p>
                </div>
                <div class="container-fluid signature">
                    <div class="row">
                        <div class="col-md-4">
                            <p>Payer Signature</p>
                        </div>
                        <div class="col-md-4">
                            <p>Cashier Signature (Bank)</p>
                        </div>
                        <div class="col-md-4">
                            <p>Officer Signature (Bank)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4" id="part-two" style="border-right:1px dashed #606065;border-left:1px dashed #606065">
                <span class="origin">College Copy</span>
            </div>
            <div class="col-4" id="part-three">
                <span class="origin">Student Copy</span>
            </div>
        </div>

    </section>

    <!-- Modal -->
    <div class="modal fade" id="bankListModal" tabindex="-1" aria-labelledby="bankListModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select a Bank</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach($banks as $bank)
                        <label class="card border border-default rounded m-1">
                            <div class="card-body p-1">
                                <div class="row">
                                    <div class="col-md-1 text-center">
                                        <input type="radio" name="bank" id="bank-{{ $bank->id }}" value="{{ $bank->id }}" data-name="{{ $bank->name }}" data-branch="{{ $bank->branch }}" data-account-number="{{ $bank->account_number }}" style="vertical-align: middle" onchange="loadBank(this)">
                                    </div>
                                    <div class="col-md-11">
                                        {{ $bank->name }}<br>{{ $bank->branch }}<br>{{ $bank->account_number }}
                                    </div>
                                </div>
                            </div>
                        </label>
                    @endforeach
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Done</button>
{{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div>
        </div>
    </div>

@stop

@section('style')
    <style>
        .row > .origin{
            position: absolute;
            top: 285px;
            left: 150px;
            /*transform: rotate(90deg);*/
            /*transform-origin: top left 0;*/
            color: darkred;
        }
        #part-one .origin,
        #part-two .origin,
        #part-three .origin{
            position: absolute;
            /*top: 400px;*/
            top: -17px;
            /*left: 30px;*/
            left: 150px;
            /*transform: rotate(90deg);*/
            /*transform-origin: top left 0;*/
            color: darkred;
        }
        .inv-header {
            margin-bottom: 20px;
        }

        .institute-info{
            /*margin-bottom: 30px;*/
        }
        .inv-header h4{
            text-align: center;
        }
        .inv-header p{
            line-height: 1.3;
            font-size: 13px;
            text-align: center;
            color: #0d10b9;
            margin-bottom: 0 !important;
        }
        .inv-header h4{
            margin-bottom: 0.1rem;
            font-size: 1.3rem;
        }

        .institute-info span{
            color: orangered;
        }

        .class-info{
            margin-bottom: 5px;
        }
        .class-info span{
            color: #000000;
        }

        .inv-table{
            width: 100%;
            max-width: 100%;
            font-size: .8rem;
        }
        .institute-info p{
            line-height: 0.3;
            font-size: 12px;
        }
        .class-info p{
            line-height: 0.3;
            font-size: 12px;
        }
        .signature{
            margin-top: 30px;
        }
        .signature p{
            line-height: 0.9;
            font-size: 12px;
            border-top: 1px solid;
            text-align: center;
            padding-top: 1px;
        }

        /* Slip Style Start from here*/
        .slip p{
            line-height: 1.5;
        }
        .table td{
            padding: 0;
        }
        #cost-memo p{
            line-height: 0.3;
        }

        @page{
            margin: 5mm 5mm 5mm 5mm;
            size: landscape;
        }

        @media print{
            .row > .origin{
                top: 0;
            }
        }
        /*@media print{*/
        /*    @page {*/
        /*        size: landscape*/
        /*    }*/
        /*}*/
    </style>
@stop

@section('script')
    <script>
        $(document).ready(function(){
            $("#part-one").children().clone().appendTo("#part-two");
            $("#part-one").children().clone().appendTo("#part-three");
        })
    </script>
    <script>
        function loadBank(bank){
            var name = bank.getAttribute("data-name");
            var branch = bank.getAttribute("data-branch");
            var acc = bank.getAttribute("data-account-number");
            //alert("The " + animal.innerHTML + " is a " + animalType + ".");
            $(".bank-name").text(name);
            $(".bank-branch").text(branch);
            $(".bank-account-number").text(acc);
        }
    </script>
@stop
