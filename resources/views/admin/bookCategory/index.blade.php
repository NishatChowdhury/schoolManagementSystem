@extends('layouts.fixed')

@section('title','Add Category')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Book Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add New Category</li>
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
{{--                    <div class="card card-light">--}}
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif

                    <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!!  Form::open(['action'=>'BookCategoryController@store','method'=>'post']) !!}
                                        <div class="form-group row">
                                            {{ Form::label('book_category', 'Book Category',['class'=>'col-sm-2 col-form-label' ]) }}
                                            <div class="col-sm-8">
                                                {{ Form::text('book_category', null, ['placeholder' => 'Enter Category Name','class'=>'form-control']) }}
                                            </div>
                                            {!! Form::submit('Add', ['class'=>'btn btn-success col-sm-2']) !!}
                                        </div>
                                        {{--                                    <div class="form-group mx-sm-3 mb-2">--}}
                                        {{--                                    </div>--}}
                                        {!! Form::close() !!}
                                    </div>
                                </div>

                            </div>
                        </div>

                            <hr>

                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#SL</th>
                                        <th class="text-center">Category Name</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @php $i = 1; @endphp
                                    @foreach($categories as $category)
                                        <tr>
                                            <td class="text-center"> {{ $i++ }}</td>
                                            <td class="text-center"> {{ $category->book_category }} </td>
                                            <td class="text-center">
                                                {{ Form::open(['route'=>['bookCategory.delete',$category->id],'method'=>'post','onsubmit'=>'return confirmDelete()']) }}
                                                {{--                                            <a href="{{ action('BookCategoryController@edit',$category->id) }}" role="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>--}}
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleEditModal" onclick="loadEditForm({{$category->id}})"><i class="fas fa-edit"></i></button>
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
                    </div>
                    <!-- /.card -->

{{--                </div>--}}
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Edit Modal -->
    <div class="modal fade" id="exampleEditModal" tabindex="-1" aria-labelledby="exampleEditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" id="edit-model-header">
                    <h5 class="modal-title" id="exampleEditModalLabel">Edit Book Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Edit form will appeared here -->
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this category? Book under this category will also be deleted!');
            return !!x;
        }
    </script>
    <script>
        function loadEditForm(id){
            var token = "{{ csrf_token() }}";
            $.ajax({
                url:"{{ route('book-category.edit') }}",
                data: {_token:token,id:id},
                type: 'get'
            }).done(function(e){
                $("#edit-form").remove();
                $("#edit-model-header").after(e);
            })
        }
    </script>
@stop
