@extends('layouts.fixed')

@section('title','Library Management')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Books In Library</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Books</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin: 10px;">
                        <!-- form start -->
                        {{ Form::open(['action'=>'BookController@search','role'=>'form','method'=>'get']) }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Search Your Book By Name:</label>
                                    <div class="input-group">
                                        {{ Form::text('book_title',null,['class'=>'form-control','id'=>'book_title','placeholder'=>'Enter Your book Name Here:']) }}
                                    </div>
                                </div>
                                <div class="col-1" style="padding-top: 32px;">
                                    <div class="input-group">
                                        <button  style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

{{--    Modal Starts here--}}
{{--    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="ModalLabel">Modal title</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                {{ Form::open(['route'=>'issueBook.store']) }}--}}
{{--                <div class="modal-body">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="student_id" class="col-sm-4 col-form-label" style="font-weight: 500; text-align: right">Student ID</label>--}}
{{--                        <div class="col-sm-8">--}}
{{--                            <div class="input-group">--}}
{{--                                {{ Form::select('student_id',$studentID,null,['class'=>'form-control','placeholder'=>'Select Student ID']) }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group row">--}}
{{--                        <label for="book_code" class="col-sm-4 col-form-label" style="font-weight: 500; text-align: right">Student ID</label>--}}
{{--                        <div class="col-sm-8">--}}
{{--                            <div class="input-group">--}}
{{--                                {{ Form::select('book_code',$bookCode,null,['class'=>'form-control','placeholder'=>'Select Book ID']) }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                    <button type="submit" class="btn btn-primary">Save changes</button>--}}
{{--                </div>--}}
{{--                {{ Form::close() }}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--Modal Ends Here--}}



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>#SL</th>
                                <th>Book Title</th>
                                <th>Author Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Available</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="search">
                            @foreach($allBooks as $key => $value)
                                <tr class="{{$value->id}}">
                                    <td>{{  $key+1 }}</td>
                                    <td>{{  $value->book_title }}</td>
                                    <td>{{  $value->author_name }}</td>
                                    <td>{{  $value->description }}</td>
                                    <td>{{  $value->category->book_category }}</td>
                                    <td><a class="btn btn-success">{{  $value->no_of_issue }} </a></td>
                                    <td>
                                        {{ Form::open(['route'=>['newBook.delete',$value->id],'method'=>'post','onsubmit'=>'return confirmDelete()']) }}
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal" onclick="loadForm({{$value->id}})">
                                            <i class="fas fa-info"></i>
                                        </button>
                                        <a href="{{ action('BookController@edit',$value->id) }}" role="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fas fa-trash"></i>
                                        </button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

{{--Modal Starts Here--}}

    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" id="model-header">
                    <h5 class="modal-title" id="modalLabel">Issue A Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['route'=>'issueBook.store']) }}
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="student_id" class="col-sm-4 col-form-label" style="font-weight: 500; text-align: right">Student ID</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                {{ Form::select('student_id',$studentID,null,['class'=>'form-control','id'=>'student_id','placeholder'=>'Select Student ID']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="book_code" class="col-sm-4 col-form-label" style="font-weight: 500; text-align: right">Book ID</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                {{ Form::select('book_code',$bookCode,null,['class'=>'form-control','placeholder'=>'Select Book ID']) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Issue Book</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

{{--Modal Starts Here--}}

    @section('script')
        <script>
            $('#book_title').keyup(function () {
                var text = $(this).val();
                var csrf = "{{csrf_token()}}";
                $.ajax({
                    type:"get",
                    url:"{{route('allBooks.search')}}",
                    data: {text:text,_token:csrf},
                    success:function(data) {
                        $('#search').html(data);
                    }
                })
            });
        </script>

        <script>
            function loadForm(id){
                var token = "{{ csrf_token() }}";
                $.ajax({
                    url:"{{ route('issueBook.index') }}",
                    data: {_token:token,id:id},
                    type: 'get'
                }).done(function(e){
                    $("#edit-form").remove();
                    $("#model-header").after(e);
                })
            }
        </script>
    @stop
@stop

