@extends('layouts.fixed')

@section('title','Message | CMS')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Message</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Messes</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="col">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="border-bottom: none !important;">
                                <div class="row">

                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#Sl</th>
                                        <th>Data</th>
                                        <th>name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @php $i=1; @endphp
                                    <tbody>
                                        @foreach($messages as $message)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ \Carbon\Carbon::parse($message->created_at)->format('m F Y') }}</td>
                                                <td>{{ $message->name   }}</td>
                                                <td>{{ $message->phone }}</td>
                                                <td>{{ $message->email }}</td>
                                                <td>{{ $message->message }}</td>
                                                <td>
                                                    {{ Form::open(['action'=>['MessagesController@destroy',$message->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                                    <a type="button" class="btn btn-warning btn-sm edit" value="{{ $message->id  }}" >View</a>
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    {{ Form::close() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-sm-12 col-md-9">
                                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <nav aria-label="Page navigation example">

                                            {{--<ul class="pagination">--}}
                                            {{--<li class="page-item"><a class="page-link" href="#">First</a></li>--}}
                                            {{--<li class="page-item"><a class="page-link" href="#">Previous</a></li>--}}
                                            {{--<li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
                                            {{--<li class="page-item"><a class="page-link" href="#">Last</a></li>--}}
                                            {{--</ul>--}}
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">

                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="text-center"><b>Name</b></div>
                                        <div class="m_name text-center"> </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="text-center"><b>Phone</b></div>
                                        <div class="m_phone text-center"> </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="text-center"><b>email</b></div>
                                        <div class="m_email text-center"> </div>
                                    </div>

                            </div>

                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row" style="margin-top: 10px">
                                <div class="m_message"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
@stop


@section('script')
    <script>
        $(document).on('click','.edit',function () {
            $("#edit").modal("show");
            var id = $(this).attr('value');
            $.ajax({
                method  :   'post',
                url     :   '{{ url('message-view') }}',
                data    :   {id:id,"_token":"{{ csrf_token() }}"},
                dataType:   'json',
                success:function(response){
                    console.log(response);
                    $(".m_name").html(response.name);
                    $(".m_phone").html(response.phone);
                    $(".m_email").html(response.email);
                    $(".m_message").html(response.message);
                },
                error:function(err){
                    console.log(err);
                }
            });

        });

        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this Message item?');
            return !!x;
        }

    </script>
@stop