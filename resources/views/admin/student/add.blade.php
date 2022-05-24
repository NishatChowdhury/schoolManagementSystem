@extends('layouts.fixed')

@section('title','Student Registration')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">Student</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add New Student</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-light">
                        {{-- @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        <!-- /.card-header -->
                        <!-- form start -->
                        {!!  Form::open(['action'=>'StudentController@store', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}
                            @include('admin.student.form')
                        {!! Form::close() !!}
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop

@section('script')
    <script>
        $(document).on('change', '.session', function () {
            var id= $(this).val();

            $.ajax({
                url: '{{url("get-ClassSectionBySession/")}}'+id,
                type: 'GET',
                success:function (data) {
                    console.log(data);
                    if (data.length>0){
                        var $select_class =  $('.class');
                        var html = '<option disabled selected> Select Class-Section</option>';
                        $.each(data, function (idx, item) {
                            html += '<option value="' + item.id + '" data-id="'+item.section_id+'" >' + item.name + ' [ Sec- '+item.section+' ]</option>';
                        });
                        $select_class.html(html);
                    }
                }
            });
        });

        $(document).on('change', '.class', function () {
            //var id = $(this).val();
            var section_id = $(this).attr("data-id");
            console.log(section_id);
            $('.section').html(section_id);
        });

        $(document).on('keyup','#rank', function () {
            alert();
            var academicYear = $('.year').val();
            $.ajax({
                url:"{{url('admin/load_student_id')}}",
                type:'GET',
                data:{academicYear:academicYear},
                success:function (data) {
                    console.log(data);
                    $('#studentID').val(data);

                }
            });
        });
    </script>
@stop
