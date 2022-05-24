@extends('layouts.fixed')

@section('title','Account | Trial Balance')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ledger</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Accounts</a></li>
                        <li class="breadcrumb-item active">Trial Balance</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container">
        <div class="card mb-3">
            {{ Form::open(['action'=>'AccountingController@trialBalance','method'=>'get']) }}
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
    <section class="content pb-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Trial Balance Summery </h3>
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Account</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $debit = []; $credit = [] @endphp
                                @foreach($accounts as $account)
                                    <tr>
                                        <td>{{ $account->code ?? '' }}</td>
                                        <td>{{ $account->name ?? '' }}</td>
                                        <td class="text-right">
                                            {{ number_format($debit[] = balance($account->id,$start,$end,'dr'),2) }}
                                        </td>
                                        <td class="text-right">
                                            {{ number_format($credit[] = balance($account->id,$start,$end,'cr'),2) }}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="text-right">
                                    <th colspan="2">Total</th>
                                    <th class="text-right">
                                        {{ number_format(array_sum($debit),2) }}
                                    </th>
                                    <th class="text-right">
                                        {{ number_format(array_sum($credit),2) }}
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

