@extends('layouts.fixed')

@section('title','Account | Profit & Loss')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profit & Loss</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Accounts</a></li>
                        <li class="breadcrumb-item active">Profit & Loss</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container">
        <div class="card mb-2">
                {{ Form::open(['action'=>'AccountingController@profitNLoss','method'=>'get']) }}
                <div class="d-flex justify-content-center">
                    <div class="form-group col-md-3">
                        <label for="" class="col-form-label">Start Date</label>
                        {{ Form::date('start_date',null,['class'=>'form-control']) }}
                    </div>
                    <div class="form-group col-md-3">
                        <label for="" class="col-form-label">End Date</label>
                        {{ Form::date('end_date',null,['class'=>'form-control']) }}
                    </div>
                    <div class="form-group col-md-2">
                        <label for="" class="col-form-label">&nbsp;</label><br>
                        <button type="submit" class="btn btn-info">Search</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
    </div>

    <!-- ***/Chart of Accounts page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Profit & Loss </h3>
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>
                                        <span class="pull-left m-0">Expense</span>
                                        <span class="pull-right m-0">Amount</span>
                                    </th>
                                    <th>
                                        <span class="pull-left m-0">Income</span>
                                        <span class="pull-right m-0">Amount</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $in = []; $ex = [] @endphp
                                <tr>
                                    <td>
                                        @foreach($expenses->childs as $parents)
                                            <b>{{ $parents->name }}</b>
                                            @foreach($parents->children as $coa)
                                                <div class="d-flex justify-content-between">
                                                    <span>{{ $coa->name }}</span>
                                                    <span>{{ number_format($ex[] = balance($coa->id,$start,$end,'dr'),2) }}</span>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($incomes->childs as $parents)
                                            <b>{{ $parents->name }}</b>
                                            @foreach($parents->children as $coa)
                                                <div class="d-flex justify-content-between">
                                                    <span>{{ $coa->name }}</span>
                                                    <span>{{ number_format($in[] = balance($coa->id,$start,$end,'cr'),2) }}</span>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($ex > $in)
                                            <div class="d-flex justify-content-between text-bold text-primary">
                                                <span>To Gross Profit</span>
                                                <span>
                                                    {{ number_format($ex[] = netProfit($start,$end),2) }}
{{--                                                    {{ number_format($ex[] = array_sum($in) - array_sum($ex),2) }}--}}
                                                </span>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($in > $ex)
                                            <div class="d-flex justify-content-between text-bold text-primary">
                                                <span>By Gross Loss</span>
                                                <span>
                                                    {{ number_format($in[] = netProfit($start,$end),2) }}
{{--                                                    {{ number_format($in[] = array_sum($ex) - array_sum($in),2) }}--}}
                                                </span>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="text-right">
                                    <th class="text-right">
                                        {{ number_format(array_sum($ex),2) }}
                                    </th>
                                    <th class="text-right">
                                        {{ number_format(array_sum($in),2) }}
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-sm-12 col-md-9">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    {{--                                    {{ $chartOfAccounts->links() }}--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
<!-- /Chart of Accounts page inner Content End***-->

<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">
@stop

<!-- *** External JS File-->
@section('plugin')
    <script src= "{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
@stop


@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datePicker')
                .datepicker({
                    format: 'yyyy-mm-dd'
                })
        });
    </script>
    <script>
        $(function () {
            $('.select2').select2();
        });
    </script>
@stop

