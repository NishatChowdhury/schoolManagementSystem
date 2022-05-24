@extends('layouts.fixed')

@section('title','Fee Details')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('View Fee Details')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('View Fee Details') }}</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.Search-panel -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin: 0px;">
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-sm">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Serial</th>
                                    <th>Fee Category</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=0 ?>
                                @foreach($fee_pivot as $fee)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $fee->fee_category_id }}</td>
                                                <td>{{ $fee->amount }}</td>
                                            </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br>

        </div>
    </section>


@stop

@section('script')
@endsection
