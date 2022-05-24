@extends('layouts.fixed')

@section('title','Settings | Syllabus')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Syllabus</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Syllabus</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- ***/Image page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <h3 class="card-title"><span style="padding-right: 10px;margin-left: 10px;"><i class="fas fa-book" style="border-radius: 50%; padding: 15px; background: #3d807a; color: #ffffff;"></i></span>Total Found : {{ $syllabuses->count() }}</h3>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> Add Syllabus</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>sl</th>
                                    <th>Class Name </th>
                                    <th>Session</th>
                                    <th>Title</th>
                                    <th>Syllabus</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @php $i=1; @endphp
                                <tbody>
                                    @foreach($syllabuses as $syllabus)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $syllabus->academicClass->academicClasses->name ?? '' }}&nbsp;{{ $syllabus->academicClass->section->name ?? '' }}{{ $syllabus->academicClass->group->name ?? '' }}</td>
                                            <td>{{ $syllabus->academicClass->sessions->year ?? '' }}</td>
                                            <td>{{ $syllabus->title}}</td>
                                            <td>
                                                <a href="{{ asset('assets/syllabus') }}/{{ $syllabus->file }}" class="btn btn-success btn-sm" target="_blank">View Syllabus <i class="fas fa-eye"></i></a>
                                            </td>
                                            <td>
                                                {{ Form::open(['action'=>['SyllabusController@destroy',$syllabus->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
{{--                                                <a href="{{ route('syllabus.delete',$syllabus->id) }}" class="btn btn-danger btn-sm" onclick="confirm('Do you want to delete this Syllabus ?')"><i class="fas fa-trash"></i> </a>--}}
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                {{ Form::close() }}
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


    <!-- ***/ Pop Up Model for button -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Syllabus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--<form>--}}
                    {{ Form::open(['action'=>'SyllabusController@store','method'=>'post','files'=>true]) }}

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Academic Class</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <select name="academic_class_id" id="inputState" class="form-control" >
                                    <option value=""> -- Select Academic Class -- </option>
                                    @foreach($academic_class as $value)
                                        <option value="{{ $value->id }}"> {{ $value->academicClasses->name ?? '' }} {{$value->section->name ?? ''}}{{ $value->group->name ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
{{--                    <input type="hidden" name="session_id" class="form-control" value="{{$value->session_id}}">--}}
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Title</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="title" class="form-control" id=""  aria-describedby="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Syllabus (pdf)*</label>
                        <div class="col-sm-10">
                            <div class="form-group files color">
                                <input type="file" name="file" class="form-control" multiple="">
                            </div>
                        </div>
                    </div>
                    <div style="float: right">
                        <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                    </div>
                    {{ Form::close() }}
                    {{--</form>--}}

                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for button End-->
@stop
<!--/Image page inner Content End***-->

<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">--}}
@stop

<!-- *** External JS File-->
@section('plugin')
{{--    <script src= "{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>--}}
@stop


@section('script')
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want delete this syllabus?');
            return !!x;
        }
    </script>
@stop




