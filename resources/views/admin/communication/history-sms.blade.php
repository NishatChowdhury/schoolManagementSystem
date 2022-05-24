@extends('layouts.fixed')

@section('title','Communication | SMS History')


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>SMS History</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Communication</a></li>
                        <li class="breadcrumb-item active">SMS History</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="dec-block">
                                        <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00AAAA; border-radius: 50%;" >
                                            <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                        </div>
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">Total Found</h5>
                                            <p>0</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="dec-block">
                                        <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00AAAA; border-radius: 50%;" >
                                            <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                        </div>
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">SMS Subtotal</h5>
                                            <p>0</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="dec-block" style="float: right; margin-top: 20px; margin-right: 100px;">
                                        <a href="#" class="btn btn-success btn-sm" style="padding: 5px 15px"><i class="fa fa-mobile"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Type</th>
                                    <th>Send By</th>
                                    <th>Destination Count</th>
                                    <th>SMS Count Per Destination</th>
                                    <th>Total SMS</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($histories as $history)
                                <tr>
                                    <td>{{ $history->created_at }}</td>
                                    <td>{{ $history->type }}</td>
                                    <td>{{ $history->user->name ?? '' }}</td>
                                    <td><span title="{{ $history->numbers }}">{{ $d = $history->destination_count }}</span></td>
                                    <td><span title="{{ $history->message }}">{{ $s = $history->sms_count }}</span></td>
                                    <td>{{ $d * $s }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-sm-12 col-md-9">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <nav aria-label="Page navigation example">
                                        {{ $histories->links() }}
                                        {{--<ul class="pagination">--}}
                                            {{--<li class="page-item"><a class="page-link" href="#">First</a></li>--}}
                                            {{--<li class="page-item"><a class="page-link" href="#">Previous</a></li>--}}
                                            {{--<li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
                                            {{--<li class="page-item"><a class="page-link" href="#">Last</a></li>--}}
                                        {{--</ul>--}}
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
