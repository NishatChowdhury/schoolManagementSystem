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
                        <li class="breadcrumb-item"><a href="#">Classes</a></li>
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
                                            <h5 style="margin-bottom: 0px;">{{ $class->academicClasses->name ?? '' }} - {{ $class->section->name ?? '' }}{{ $class->group->name ?? '' }}</h5>
                                            <p>{{ $class->academicClasses->short_name }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="dec-block">
                                        <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00AAAA; border-radius: 50%;" >
                                            <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                        </div>
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">Total Found</h5>
                                            <p>{{ $assignedSubjects->count() }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="float: left;">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> Subject</button>
                                    </div>
{{--                                    <div style="float: right;">--}}
{{--                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#schedule" data-whatever="@mdo" style="margin-top: 10px; margin-left: 10px; float: right !important;"> <i class="fas fa-plus-circle"></i> Class Schedule</button>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Short Name </th>
                                    <th>Teacher</th>
                                    <th>Pass Mark</th>
                                    <th>Optional</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($assignedSubjects as $sub)
                                    <tr>
                                        <td>{{$sub->subject->code}}</td>
                                        <td>{{$sub->subject->name}}</td>
                                        <td>{{$sub->subject->short_name}}</td>
                                        <td>{{ $sub->staff }}</td>
                                        <td>
                                            @if($sub->objective_pass)
                                                Obj-{{$sub->objective_pass}};
                                            @endif
                                            @if($sub->written_pass)
                                                Wrtn-{{$sub->written_pass}};
                                            @endif
                                            @if($sub->practical_pass)
                                                Pra-{{ $sub->practical_pass }};
                                            @endif
                                            @if($sub->viva_pass)
                                                Viva-{{ $sub->viva_pass }}
                                            @endif
                                        </td>
                                        <td>{{$sub->is_optional ? 'YES' : 'NO'}}</td>
                                        <td></td>
                                        <td>
                                            {{ Form::open(['action'=>['InstitutionController@unAssignSubject',$sub->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
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

    <!-- ***/ Pop Up Model for subjects -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assign Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
{{--                        {{ Form::model($subject,['action'=>'InstitutionController@assign_subject']) }}--}}

{{--                        {{ Form::close() }}--}}
                        {!! Form::open(['action'=>'InstitutionController@assign_subject', 'method'=>'post', 'class'=>'form-inline']) !!}

                        @foreach($subjects as $subject)
{{--                            <div class="form-check form-check-inline">--}}
{{--                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">--}}
{{--                                <label class="form-check-label" for="inlineCheckbox1">1</label>--}}
{{--                            </div>--}}
                        {{ Form::hidden('academic_class_id',$class->id) }}
                        <div class="col-6">
                            <div class="form-check form-check-inline mb-2" style="justify-content: normal">
                                <input type="checkbox" name="subjects[]" value="{{ $subject->id }}" class="form-check-input sub" id="sub-{{ $subject->id }}">
                                <label class="form-check-label" for="sub-{{ $subject->id }}">{{ $subject->name }}</label>
                            </div>
                        </div>
                        @endforeach

{{--                        <div class="form-group row">--}}
{{--                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Select Class*</label>--}}
{{--                            <div class="col-sm-9">--}}
{{--                                <div class="input-group">--}}
{{--                                    {!! Form::select('academic_class_id', $classes, $class->id, ['class'=>'form-control','readonly']) !!}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Select Subject*</label>--}}
{{--                            <div class="col-sm-9">--}}
{{--                                <div class="input-group">--}}
{{--                                    {!! Form::select('subject_id', $subjects, null, ['class'=>'form-control']) !!}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Teacher*</label>--}}
{{--                            <div class="col-sm-9">--}}
{{--                                <div class="input-group">--}}
{{--                                    {!! Form::select('teacher_id', $staffs, null, ['class'=>'form-control']) !!}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="" class="col-sm-3 col-form-label"></label>--}}
{{--                            <div class="col-sm-9">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input name="is_optional" class="form-check-input" type="checkbox" value=1 id="defaultCheck1">--}}
{{--                                </div>--}}
{{--                                <label class="form-check-label" for="defaultCheck1">Is Optional?</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Objective Pass Mark</label>--}}
{{--                            <div class="col-sm-9">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="number" name="objective_pass" class="form-control">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Written Pass Mark</label>--}}
{{--                            <div class="col-sm-9">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="number" name="written_pass" class="form-control">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Practical Pass Mark</label>--}}
{{--                            <div class="col-sm-9">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="number" name="practical_pass" class="form-control">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Viva Pass Mark</label>--}}
{{--                            <div class="col-sm-9">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="number" name="viva_pass" class="form-control">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group" style="float: right">
                            <button type="submit" class="btn btn-success btn-sm pull-right" > <i class="fas fa-plus-circle"></i> Assign Subjects</button>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>



    <!-- ***/ Pop Up Model for Add Class Schedule -->
    <div class="modal fade" id="schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Class Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="col">
                                <select id="inputState" class="form-control" style="height: 35px !important;">
                                    <option selected>Select Subjects...</option>
                                    <option>...</option>
                                    <option>...</option>
                                    <option>...</option>
                                    <option>...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="" aria-describedby="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4"> Start* </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="" aria-describedby="" placeholder="10.00" >
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-clock nav-icon"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4"> End* </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="" aria-describedby="" placeholder="10.00">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-clock nav-icon"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div style="float: right">
                        <button type="button" class="btn btn-success btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

@stop

@section('script')
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure, you want to unmount this subject?');
            return !!x;
        }
    </script>
@stop
