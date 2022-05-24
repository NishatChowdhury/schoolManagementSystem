@extends('layouts.fixed')

@section('title','Institution Mgnt | Subjects')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Subjects</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Institution Mgnt</a></li>
                        <li class="breadcrumb-item active">Subjects</li>
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
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="dec-block">
                                        <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00AAAA; border-radius: 50%;" >
                                            <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                        </div>
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">Total Found</h5>
                                            <p>100</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="float: left;">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Short Name </th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 0)
                                @foreach($subjects ?? '' as $subject)
                                    <tr>
                                        <td>{{ $subject->id }}</td>
                                        <td>{{$subject->name}}</td>
                                        <td>{{$subject->code}}</td>
                                        <td>{{$subject->short_name}}</td>
                                        <td>
                                            <a type="button" class="btn btn-warning btn-sm edit" value='{{$subject->id}}'
                                               style="margin-left: 10px;" title="EDIT"> <i class="fas fa-edit"></i>
                                            </a>

                                            <a type="button" href="{{action('InstitutionController@delete_subject', $subject->id)}}"
                                               class="btn btn-danger btn-sm delete_subject"
                                               style="margin-left: 10px;" title="DELETE"> <i class="fas fa-trash"></i>
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
    </section>

    <!-- ***/ Pop Up Model for subjects -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['action'=>'InstitutionController@create_subject', 'method'=>'post']) !!}
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Code</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="code" class="form-control" id="code"  aria-describedby="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Name*</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" id="name"  aria-describedby="" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Short Name</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="short_name" class="form-control" id="short_name"  aria-describedby="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Level</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="level" class="form-control" id="level"  aria-describedby="" placeholder="Eg. Primary/Common...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Tuition Fee</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="credit_fee" class="form-control" id="credit_fee"  aria-describedby="">
                            </div>
                        </div>
                    </div>
                    {{--<div class="form-group row">
                        <div class="col-sm-4">
                            <div style="margin-left: 170px;">
                                <div class="input-group">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                </div>
                                <label class="form-check-label" for="defaultCheck1">
                                    Is Split
                                </label>
                            </div>
                        </div>
                    </div>--}}

                    <div style="float: right">
                        <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i>Add</button>
                    </div>
                    {!! Form::close() !!}
                </div>

                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

    <!-- ***/ Pop Up Model for EDIT subjects -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['action'=>'InstitutionController@update_subject', 'method'=>'post']) !!}
                    {!! Form::hidden('id', null, ['id'=> 'sub_id']) !!}
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Code</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="code" class="form-control" id="sub_code"  aria-describedby="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Name*</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" id="sub_name"  aria-describedby="" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Short Name</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="short_name" class="form-control" id="sub_short_name"  aria-describedby="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Level</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="level" class="form-control" id="sub_level"  aria-describedby="" placeholder="Eg. Primary/Common...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Tuition Fee</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="credit_fee" class="form-control" id="sub_credit_fee"  aria-describedby="">
                            </div>
                        </div>
                    </div>

                    <div style="float: right">
                        <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i>Update</button>
                    </div>
                    {!! Form::close() !!}
                </div>

                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $(document).on('click', '.edit', function () {
            $("#edit").modal("show");
            var id = $(this).attr('value');

            $.ajax({
                method:"post",
                url:"{{ url('institution/edit-subject')}}",
                data:{id:id,"_token":"{{ csrf_token() }}"},
                dataType:"json",
                success:function(response){

                    console.log(response);
                    $("#sub_id").val(response.id);
                    $("#sub_name").val(response.name);
                    $("#sub_code").val(response.code);
                    $("#sub_short_name").val(response.short_name);
                    $("#sub_level").val(response.level);
                    $("#sub_credit_fee").val(response.credit_fee);

                },
                error:function(err){
                    console.log(err);
                }
            });
        });
    </script>
@stop