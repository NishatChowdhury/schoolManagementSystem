@extends('layouts.fixed')

@section('title','Settings | Site Menu')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Site Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Menu</li>
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
                                <h3 class="card-title"><span style="padding-right: 10px;margin-left: 10px;"><i class="fas fa-book" style="border-radius: 50%; padding: 15px; background: #3d807a; color: #ffffff"></i></span>Total Found : 1000</h3>
                            </div>
                            <div class="row">
                                <div>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Parent</th>
                                    <th>Order</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $x = 1 @endphp
                                @foreach($menus as $menu)
                                    <tr>
                                        <td>{{ $x++ }}</td>
                                        <td>{{ $menu->name }}</td>
                                        <td>{{ $menu->uri }}</td>
                                        <td>{{ $menu->order }}</td>
                                        <td>
                                            {{ Form::open(['action'=>['MenuController@destroy',$menu->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleEditModal" onclick="loadEditForm({{$menu->id}})"><i class="fas fa-edit"></i></button>
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                    @foreach($menu->children as $child)
                                        <tr>
                                            <td></td>
                                            <td>---> {{ $child->name }}</td>
                                            <td>{{ $child->uri }}</td>
                                            <td>{{ $child->order }}</td>
                                            <td>
                                                {{ Form::open(['action'=>['MenuController@destroy',$child->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleEditModal" onclick="loadEditForm({{$child->id}})"><i class="fas fa-edit"></i></button>
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                        @foreach($child->children as $child)
                                            <tr>
                                                <td></td>
                                                <td>------> {{ $child->name }}</td>
                                                <td>{{ $child->uri }}</td>
                                                <td>{{ $child->order }}</td>
                                                <td>
                                                    {{ Form::open(['action'=>['MenuController@destroy',$child->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleEditModal" onclick="loadEditForm({{$child->id}})"><i class="fas fa-edit"></i></button>
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                    {{ Form::close() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-sm-12 col-md-9">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-3">
{{--                                    {{ $chartOfAccounts->links() }}--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['route'=>'menu.store']) }}
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label" style="font-weight: 500; text-align: right">Parent</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                {{ Form::select('menu_id',$parents,null,['class'=>'form-control','placeholder'=>'Select Parent Menu if any']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label" style="font-weight: 500; text-align: right">Menu Name*</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                {{ Form::text('name',null,['class'=>'form-control','required']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label" style="font-weight: 500; text-align: right">Page Type*</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                {{ Form::select('type',[4=>'Parent Menu',1=>'Page',2=>'URL',3=>'System Page'],null,['class'=>'form-control','id'=>'page-type','required']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label" style="font-weight: 500; text-align: right">Select Page*</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                {{ Form::select('page_id',$pages,null,['class'=>'form-control','id'=>'page']) }}
                                {{ Form::text('url',null,['class'=>'form-control','id'=>'url']) }}
                                {{ Form::select('system_page',$systemPages,null,['class'=>'form-control','id'=>'system-page']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label" style="font-weight: 500; text-align: right">URI*</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                {{ Form::text('uri',null,['class'=>'form-control','required']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label" style="font-weight: 500; text-align: right">Order Key*</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                {{ Form::text('order',null,['class'=>'form-control','required']) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="exampleEditModal" tabindex="-1" aria-labelledby="exampleEditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" id="edit-model-header">
                    <h5 class="modal-title" id="exampleEditModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            </div>
        </div>
    </div>

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
        $(document).ready(function(){
            var pageType = $("#page-type").val();
            if(pageType === '1'){
                $("#page").show();
                $("#url").hide();
                $("#system-page").hide();
            }else if(pageType === '2'){
                $("#page").hide();
                $("#url").show();
                $("#system-page").hide();
            }else if(pageType === '3'){
                $("#page").hide();
                $("#url").hide();
                $("#system-page").show();
            }else{
                $("#page").hide();
                $("#url").hide();
                $("#system-page").hide();
            }
        })

        $("#page-type").change(function(){
            var pageType = $(this).val();
            if(pageType === '1'){
                $("#page").show();
                $("#url").hide();
                $("#system-page").hide();
            }else if(pageType === '2'){
                $("#page").hide();
                $("#url").show();
                $("#system-page").hide();
            }else if(pageType === '3'){
                $("#page").hide();
                $("#url").hide();
                $("#system-page").show();
            }else{
                $("#page").hide();
                $("#url").hide();
                $("#system-page").hide();
            }
        })
    </script>
    <script>
        function confirmDelete(){
            let x = confirm('Are you sure you want to delete this menu?');
            return !!x;
        }
    </script>
    <script>
        function loadEditForm(id){
            var token = "{{ csrf_token() }}";
            $.ajax({
                url:"{{ route('menu.edit') }}",
                data: {_token:token,id:id},
                type: 'get'
            }).done(function(e){
                $("#edit-form").remove();
                $("#edit-model-header").after(e);
            })
        }
    </script>
@stop

