@extends('layouts.fixed')

@section('title','Finance | Transport Location')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Finance</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Finance</a></li>
                        <li class="breadcrumb-item active">Transport Location</li>
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
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card-body">
                                    @if($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    {{ Form::model(['route'=>'transport.store','method'=>'POST']) }}
                                        @include('admin.account.transport.location.form')
                                        <div class="from-group">
                                            {{ Form::button('SAVE',['type'=>'submit','class'=>'btn btn-primary']) }}
                                        </div>
                                    {{ Form::close() }}
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card-header">
                                                        <h5 class="card-title">List of Transport Location</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table  class="table table-bordered table-striped table-sm" >
                                                        <thead class="table-dark text-center">
                                                            <tr>
                                                               <th>Sl</th>
                                                               <th>Location</th>
                                                               <th>Description</th>
                                                               <th>Fare</th>
                                                               <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        @php $i=1 @endphp
                                                        <tbody>
                                                            @foreach($locations as $location)
                                                                <tr>
                                                                    <td>{{$i++}}</td>
                                                                    <td>{{ucwords($location->name)}}</td>
                                                                    <td>{{ucfirst($location->description)}}</td>
                                                                    <td style="text-align: right">{{number_format($location->amount,2)}}</td>
                                                                    <td>
                                                                        <a type="button" href="{{route('transport.edit',$location->id)}}" class="btn btn-warning btn-sm edit" style="margin-left: 10px;"> <i class="fas fa-edit"></i>
                                                                        </a>

                                                                        <a type="button" href="{{action('FeeCategoryController@delete_fee_category', $location->id)}}" class="btn btn-danger btn-sm delete_session"style="margin-left: 10px;"> <i class="fas fa-trash"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        {{ $locations->links() }}
                                                    </table>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop