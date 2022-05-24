@extends('layouts.fixed')

@section('title','Account | Ledger')

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
                        <li class="breadcrumb-item active">Ledger</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container">
        <div class="card">
            <div class="card-body">
                {{ Form::open(['action'=>'AccountingController@ledger','method'=>'get']) }}
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="" class="col-form-label">Start Date</label>
                        {{ Form::date('start_date',null,['class'=>'form-control','required']) }}
                    </div>
                    <div class="form-group col-md-3">
                        <label for="" class="col-form-label">End Date</label>
                        {{ Form::date('end_date',null,['class'=>'form-control','required']) }}
                    </div>
                    <div class="form-group col-md-4">
                        <label for="" class="col-form-label">Account</label>
                        {{ Form::select('account',$coa,null,['class'=>'form-control select2','placeholder'=>'ALL Ledger']) }}
                    </div>
                    <div class="form-group col-md-2">
                        <label for="" class="col-form-label">&nbsp;</label><br>
                        <button type="submit" class="btn btn-info">Search</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <!-- ***/Chart of Accounts page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @foreach($acc as $accounts)
                        <h3 class="text-center mt-5"><u><strong>{{ $accounts->first()->coa->name }}</strong></u></h3>
                        <div class="card">
                            {{--                        <div class="card-header" style="border-bottom: none !important;">--}}
                            {{--                            <h3>{{ $account ?? 'Account Details' }}</h3>--}}
                            {{--                        </div>--}}
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Journal</th>
                                        <th>Date</th>
                                        {{--                                    <th>Created At</th>--}}
                                        <th>Description</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $debit = []; $credit = []; @endphp
                                    @foreach($accounts as $account)
                                        <tr>
                                            <td><a class="btn btn-outline-primary btn-sm text-bold" href="{{ action('JournalController@show',$account->journal->id) }}">{{ $account->journal->journal_no }}</a></td>
                                            <td>{{ $account->journal->date }}</td>
                                            {{--                                        <td>{{ $account->journal->created_at->format('Y-m-d') }}</td>--}}
                                            <td>{{ $account->journal->description }}</td>
                                            <td class="text-right">{{ number_format($debit[] = $account->debit,2) }}</td>
                                            <td class="text-right">{{ number_format($credit[] = $account->credit,2) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="3" class="text-right">Balance:</th>
                                        <th class="text-center">
                                            @if($accounts->count() > 0)
                                                @if(array_sum($debit) > array_sum($credit))
                                                    Dr. {{ number_format(array_sum($debit) - array_sum($credit),2) }}
                                                @endif
                                            @endif
                                        </th>
                                        <th>
                                            @if($accounts->count() > 0)
                                                @if(array_sum($debit) < array_sum($credit))
                                                    Cr. {{ number_format(array_sum($credit) - array_sum($debit),2) }}
                                                @endif
                                            @endif
                                        </th>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-sm-12 col-md-9">
                                        {{--                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>--}}
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        {{--                                    {{ $chartOfAccounts->links() }}--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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

