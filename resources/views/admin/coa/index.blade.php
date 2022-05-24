@extends('layouts.fixed')

@section('title','Settings | Chart Of Accounts')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chart of Accounts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Chart of Accounts</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- ***/Chart of Accounts page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <h3 class="card-title"><span style="padding-right: 10px;margin-left: 10px;"><i class="fas fa-book" style="border-radius: 50%; padding: 15px; background: #3d807a; color: #ffffff"></i></span>Total Found : {{ $chartOfAccounts->count() }}</h3>
                            </div>
                            <div class="row">
                                <div>
                                    <a href="{{ action('ChartOfAccountController@create') }}" class="btn btn-info btn-sm" style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Parent</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $x = 1 @endphp
                                @foreach($chartOfAccounts as $coa)
                                <tr>
                                    <td>{{ $coa->code }}</td>
                                    <td class="text-right"><span class="text-secondary font-italic">{{ $coa->grandparents->name ?? '' }}</span> -> <b>{{ $coa->parents->name ?? '' }}</b></td>
                                    <td>{{ $coa->name }}</td>
                                    <td>
{{--                                        {{ $coa->is_enabled == 1 ? 'Active' : 'Inactive' }} <br>--}}
                                        <!-- Rounded switch -->
                                        <label class="switch">
                                            <input type="checkbox" {{ $coa->is_enabled ? 'checked' : '' }} onchange="statusChange({{$coa->id}})"/>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        {{ Form::open(['action'=>['ChartOfAccountController@destroy',$coa->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                        <a href="{{ action('ChartOfAccountController@edit',$coa->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                                @endforeach
{{--                                @foreach($coa as $grandParent)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $grandParent->name }}</td>--}}
{{--                                        <td>--}}
{{--                                            <ul>--}}
{{--                                                @foreach($grandParent->children as $parents)--}}
{{--                                                    <li>{{ $parents->name }}</li>--}}
{{--                                                    <ol>--}}
{{--                                                        @foreach($parents->children as $child)--}}
{{--                                                            <li>{{ $child->name }}</li>--}}
{{--                                                        @endforeach--}}
{{--                                                    </ol>--}}
{{--                                                @endforeach--}}
{{--                                            </ul>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    @endforeach--}}
                                    </tbody>
                            </table>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-sm-12 col-md-9">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    {{ $chartOfAccounts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
<!-- /Chart of Accounts page inner Content End***-->

<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">
@stop

<!-- *** External JS File-->
@section('plugin')
    <script src= "{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
@stop


@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datePicker')
                .datepicker({
                    format: 'yyyy-mm-dd'
                })
        });
    </script>
    <script>
        function statusChange(id){
            var csrf = "{{ csrf_token() }}";
            $.ajax({
                url  : '{{ action('ChartOfAccountController@isEnabled') }}',
                data : {_token:csrf,id:id},
                type : 'post'
            }).done(function(){
                location.replace("{{ action('ChartOfAccountController@index') }}");
            })
        }
    </script>
    <script>
        function confirmDelete(){
            let x = confirm('Are you sure you want to delete this account head?');
            return !!x;
        }
    </script>
@stop

