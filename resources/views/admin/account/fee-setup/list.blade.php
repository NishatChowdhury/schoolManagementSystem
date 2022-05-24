@extends('layouts.fixed')

@section('title','Account | Fee List')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Account</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Finance</a></li>
                        <li class="breadcrumb-item active">Fee Setup List</li>
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
                        <div class="col-md-12 col-sm-12" style="margin-top: 20px; ">
                            <div class="card-header">
                                <h5 class="card-title">List Fee Setup</h5>
                            </div>
                        </div>
                        <div class="card-body" style="border-bottom: none !important;">
                            <div class="row" style="margin-bottom: 15px">
                                <div class="col-md-12">
                                    <div style="float: left;">
                                        <a href="{{ action('FeeCategoryController@fee_setup',$academicClass->id) }}" class="btn btn-info btn-sm"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-eye"></i> Setup Monthly Fee</a>
                                    </div>
                                    <div style="float: right;">
                                        <button type="button" class="btn btn-success btn-sm" style="margin-top: 10px; margin-left: 10px; float: right !important;"> Session : {{ $academicClass->sessions->year ?? '' }} </button>
                                        <button type="button" class="btn btn-success btn-sm" style="margin-top: 10px; margin-left: 10px; float: right !important;">  Class :  {{ $academicClass->academicClasses->name }}</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <table id="example2" class="table table-bordered table-striped table-sm">
                                    <thead class="table-dark">
                                    <tr class="text-center">
                                        <th>SL</th>
                                        <th>Month Name</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @php $i=1 @endphp
                                    <tbody>
                                    @foreach($fee_lists as $fee_list)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{ date("F", mktime(0, 0, 0,$fee_list->month, 1))}}</td>
                                            <td >
                                                @foreach($fee_list->fee_categories as $fee)
                                                    <button type="button" class="btn btn-outline-success btn-sm">
                                                        {{$fee->name }} -
                                                        <span class="badge badge-warning">
                                                                {{ \App\FeePivot::where('fee_category_id',$fee->id)->where('fee_setup_id',$fee_list->id)->first()->amount  }}
                                                            </span>
                                                    </button>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a type="button" href="{{route('fee-setup.show',$fee_list->id)}}" class="btn btn-warning btn-sm edit" value='' style="margin-left: 10px;"> <i class="fas fa-edit"></i></a>
                                                <a type="button" href=""
                                                   class="btn btn-danger btn-sm delete_session"
                                                   style="margin-left: 10px;"> <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
