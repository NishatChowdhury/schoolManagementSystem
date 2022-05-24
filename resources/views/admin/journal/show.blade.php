@extends('layouts.fixed')

@section('title','Journal Details')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Journal Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Accounts</a></li>
                        <li class="breadcrumb-item active">Journals</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- ***/Image page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row justify-content-around">
                                <button type="button" class="btn btn-secondary">Date: {{ $journal->date }}</button>
                                <button type="button" class="btn btn-secondary">Journal No.: {{ $journal->journal_no }}</button>
                                <button type="button" class="btn btn-secondary">Ref: {{ $journal->reference }}</button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Account</th>
{{--                                    <th>Description</th>--}}
                                    <th>Debit</th>
                                    <th>Credit</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $x = 1 @endphp
                                @foreach($journal->items as $item)
                                    <tr>
                                        <th>{{ $x++ }}</th>
                                        <td>{{ $item->coa->name ?? 'Undefined' }}</td>
{{--                                        <td>{{ $item->description }}</td>--}}
                                        <td class="text-right">{{ number_format($debit[] = $item->debit,2) }}</td>
                                        <td class="text-right">{{ number_format($credit[] = $item->credit,2) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th class="text-right" colspan="2">Total</th>
                                    <th class="text-right">{{ number_format(array_sum($debit),2) }}</th>
                                    <th class="text-right">{{ number_format(array_sum($credit),2) }}</th>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="5">Description: <em class="text-secondary">{{ $journal->description }}</em></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
<!--/Image page inner Content End***-->
