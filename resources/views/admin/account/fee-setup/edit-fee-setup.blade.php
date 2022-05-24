@extends('layouts.fixed')
@section('title','Account | Fee Setup Edit  ')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Account Section</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Finance</a></li>
                        <li class="breadcrumb-item active">Fee Setup Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body" style="border-bottom: none !important;">
                            {{ Form::model($fee_setup,['action'=>['FeeCategoryController@update_fee_setup',$fee_setup->first()->id],'method'=>'PATCH']) }}
                                @include('admin.account.fee-setup.form')
                                <div class="from-group">
                                    {{ Form::button('UPDATE',['type'=>'submit','class'=>'btn btn-warning']) }}
                                </div>
                            {{ Form::close() }}

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

