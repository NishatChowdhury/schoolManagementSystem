@extends('layouts.fixed')

@section('title','Fee Collection')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Fee Collection</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Fee Collection') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Collect Fees') }}</li>
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
                        <h5 class="text-center" style="background-color: rgb(45 136 151);padding:10px;color:white"><b>Search by Student ID for Collect Fees</b></h3>
                        <div class="mx-auto pull-right">
                            <form action="{{url('admin/fee/fee-collection/view')}}" method="GET" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control mr-2" name="term" placeholder="Ex: S01" id="term">
                                        <span class="input-group-btn mr-2 ">
                                            <button class="btn btn-info" type="submit" title="Search By Student ID">
                                                <span class="fas fa-search"></span>
                                            </button>
                                        </span>
                                        <a href="{{url('admin/fee/fee-collection/view')}}" class=" ">
                                            <span class="input-group-btn">
                                                <button class="btn btn-danger" type="button" title="Refresh page">
                                                    <span class="fas fa-sync-alt"></span>
                                                </button>
                                            </span>
                                        </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop