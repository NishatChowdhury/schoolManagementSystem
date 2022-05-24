@extends('layouts.fixed')

@section('title','Staff | PaySlip')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>PaySlip</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Staffs</a></li>
                        <li class="breadcrumb-item active">PaySlip</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- ***/PaySlip page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row" style="padding: 10px;"">
                                <div class="col-md-2">
                                    <div class="dec-block">
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">Total Found</h5>
                                            <p>0</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dec-block">
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">Salary</h5>
                                            <p>00</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dec-block">
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">Bonus</h5>
                                            <p>0</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dec-block">
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">Adjusted</h5>
                                            <p>0</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dec-block">
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">Excused</h5>
                                            <p>0</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dec-block">
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">Total</h5>
                                            <p>0</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 1.00rem;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Period</th>
                                <th>Salary </th>
                                <th>Bonus</th>
                                <th>Adjusted Amount</th>
                                <th>Excused Amount</th>
                                <th>Total Amount</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-sm-12 col-md-9">
                                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">First</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Last</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop