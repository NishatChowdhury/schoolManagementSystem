@extends('layouts.fixed')

@section('title','View All Fee Setups')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Fee Collections</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Fee Collection') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('All Collections') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.Search-panel -->
    <section class="content">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin: 0px;">
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-sm">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>{{ __('Serial') }}</th>
                                        <th>{{ __('Student Name') }}</th>
                                        <th>{{ __('Student ID') }}</th>
                                        <th>{{ __('Payment Date') }}</th>
                                        <th>{{ __('Balance') }}</th>
                                        <th>{{ __('Payment Method') }}</th>
                                        <th>{{ __('Paid Amount') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($studentPayment as $key=>$payment)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$payment->student->name}}</td>
                                        <td>{{$payment->student->studentId}}</td>
                                        <td>{{$payment->payment_date}}</td>
                                        <td>{{$payment->balance}}</td>
                                        <td>{{$payment->payment_method}}</td>
                                        <td>{{$payment->paid_amount}}</td>
                                        <td>
                                            <a href="{{ url('admin/fee/all-collection/report',$payment->id) }}" role="button" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                            {{-- <a href="{{ url('admin/fee/fee-setup/edit',$fee->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> --}}
                                            {{-- <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fas fa-trash"></i>
                                            </button> --}}
                                        </td>
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
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this Fee Setup?');
            return !!x;
        }
    </script>
@endsection
