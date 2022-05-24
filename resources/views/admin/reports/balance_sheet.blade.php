@extends('layouts.fixed')

@section('title','Accounts | Balance Sheet')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Balance Sheet</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Balance Sheet</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- ***/Configured page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            {{--<div class="row">--}}
                                {{--<h3 class="card-title"><span style="padding-right: 10px;margin-left: 10px;"><i class="fas fa-user-graduate" style="border-radius: 50%; padding: 15px; background: #3d807a;"></i></span>Total Found : 1000</h3>--}}
                            {{--</div>--}}
                            <div class="row">
                                <div>
                                    {{-- <button type="button" class="btn btn-info btn-sm" disabled data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</button> --}}
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">Assets</th>
                                    <th class="text-center">Libilities</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <table class="table table-hover">
                                            @forelse($coaGrandParent->where('name','Asset Accounts')->first()->children as $coaParent)
                                            <tr>
                                                <td><b>{{ $coaParent->name }}</b></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                                @if($coaParent->children)
                                                    @forelse($coaParent->children as $coa)
                                                    <tr style="text-indent:25px">
                                                        <td>{{ $coa->name }}</b></td>
                                                        <td class="text-right">{{number_format(coa_balance($coa),2)}}</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    @empty
                                                    @endforelse
                                                @endif
                                                @empty
                                                @endforelse
                                            <tr>
                                                <td>Total Assets</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-hover">
                                            @forelse($coaGrandParent->where('name','Liability Accounts')->first()->children as $coaParent)
                                            <tr>
                                                <td><b>{{ $coaParent->name }}</b></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                                @if($coaParent->children)
                                                    @forelse($coaParent->children as $coa)
                                                    <tr style="text-indent:25px">
                                                        <td>{{ $coa->name }}</b></td>
                                                        <td class="text-right">{{number_format(coa_balance($coa),2)}}</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    @empty
                                                    @endforelse
                                                @endif
                                                @empty
                                                @endforelse
                                            <tr>
                                                <td>Total Libilites</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @forelse($coaGrandParent->where('name','Equity Accounts')->first()->children as $coaParent)
                                            <tr>
                                                <td><b>{{ $coaParent->name }}</b></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                                @if($coaParent->children)
                                                    @forelse($coaParent->children as $coa)
                                                    <tr style="text-indent:25px">
                                                        <td>{{ $coa->name }}</b></td>
                                                        <td class="text-right">
                                                            @if($coa->name !="Capital")
                                                                {{coa_balance($coa)}}</td>
                                                            @else
                                                                @php 
                                                                    $capital = coa_balance($coa);
                                                                    $income = 0;
                                                                    $expense = 0;
                                                                    foreach($revenue_coas as $coa){
                                                                        $income += coa_balance($coa);
                                                                    } 
                                                                    foreach($expense_coas as $coa){
                                                                        $expense += coa_balance($coa);
                                                                    } 
                                                                    @endphp
                                                                    {{ number_format(capital_coa_balance($capital, $income, $expense),2)}}
                                                            @endif
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    @empty
                                                    @endforelse
                                                @endif
                                                @empty
                                                @endforelse
                                            <tr>
                                                <td>Toatal Libility</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="row" style="margin-top: 10px">
                                {{-- <div class="col-sm-12 col-md-9">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing {{ $pages->firstItem() }} to {{ $pages->count() }} of {{ $pages->total() }} entries</div>
                                </div> --}}
                                <div class="col-sm-12 col-md-3">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***/Pop Up Model for button -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Configure</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Page Name*</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <select id="inputState" class="form-control" style="height: 35px !important;">
                                        <option selected>Page...</option>
                                        <option>...</option>
                                        <option>...</option>
                                        <option>...</option>
                                        <option>...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Content*</label>
                            <div class="col-sm-10">
                                <textarea id="txtEditor"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Image*</label>
                            <div class="col-sm-10">
                                <div class="form-group files color">
                                    <input type="file" class="form-control" multiple="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Order*</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id=""  aria-describedby="">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div style="float: right">
                        <button type="button" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div> --}}
    <!-- /Pop Up Model for button End***-->
@stop
<!-- /Configured page inner Content End***-->


<!-- *** External CSS  File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/editor.css') }}">
@stop

<!-- *** External JS File-->
@section('plugin')
    <script src= "{{ asset('assets/js/editor.js') }}"></script>
@stop

<!-- Scripts-->
@section('script')
    <script>
        $(document).ready(function() {
            $("#txtEditor").Editor();
        });
    </script>
@stop