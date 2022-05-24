@extends('layouts.fixed')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Testimonial</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Student</a></li>
                        <li class="breadcrumb-item active">Design Student ID</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card" style="margin: 10px;">
                                <!-- form start -->
                                <form method="GET" action="">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="">Student ID</label>
                                                <div class="input-group">
                                                    <input class="form-control" placeholder="Student ID" name="studentId" type="text">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="">Name</label>
                                                <div class="input-group">
                                                    <input class="form-control" placeholder="Name" name="name" type="text">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="">Class</label>
                                                <div class="input-group">
                                                    <select class="form-control" name="class_id"><option selected="selected" value="">Select Class</option><option value="1">Eleven</option><option value="2">Tweleve</option></select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="">Section</label>
                                                <div class="input-group">
                                                    <select class="form-control" name="section_id"><option selected="selected" value="">Select Section</option></select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="">Group</label>
                                                <div class="input-group">
                                                    <select class="form-control" name="group_id"><option selected="selected" value="">Select Group</option><option value="1">Science</option><option value="2">Business Study</option><option value="3">Humanities</option></select>
                                                </div>
                                            </div>

                                            <div class="col-1" style="padding-top: 32px;">
                                                <div class="input-group">
                                                    <button style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                           <div class="row">
                               <div class="col-md-3">
                                   <img src="{{asset('assets/img/262x230/10.jpg')}}" alt="">
                               </div>
                               <div class="col-md-6">
                                   <div class="scl-dec">
                                       <h1>Example school chittagong</h1>
                                       <p>Lorem ipsum dolor sit amet, consectetur.</p>
                                       <p>Lorem ipsum dolor</p>
                                       <p>Lorem ipsum dolor sit amet, consectetur.</p>
                                       <p>Lorem ipsum dolor sit amet, consectetur.</p>
                                       <h3>Testimonial</h3>
                                   </div>
                               </div>
                               <div class="col-md-3">
                               </div>
                           </div>
                            <div class="row">
                                <div class="dec">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad earum error eum magnam nobis numquam quas quos. Ab, adipisci odio. Dolor iusto necessitatibus omnis porro quam quas sapiente. At dolorem est, expedita ipsam labore mollitia necessitatibus odio recusandae temporibus ut? Architecto cupiditate deleniti deserunt doloribus eveniet, hic id illo impedit, iste iusto mollitia nisi quidem quo quos repudiandae sapiente sunt! Amet consectetur doloribus ex fugiat ipsam, libero magnam magni minima odit officiis quidem rem reprehenderit saepe, sed sunt tempore ullam.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aut cupiditate dignissimos ducimus ea earum eligendi eos in libero, minima nemo, numquam officiis, quas quidem unde. Eos facilis maxime nostrum nulla! Aspernatur blanditiis ea est ipsa minus sed ullam voluptas.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, veniam.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop


@section('style')
    <style>
        .scl-dec p{
            text-align: center;
            color: #0E0EFF;
            font-size: 24px;
            font-family: Great Vibes;
            font-weight: 700;
            margin-bottom: 0px;
        }
        .scl-dec h1,.scl-dec h3{
            color: #0E0EFF;
            text-align: center;
            font-family: Great Vibes;
            font-weight: 900;
        }
        .dec p{
            padding: 10px;
            font-family: Great Vibes;
            font-size: 24px;
            font-weight: bold;
            color: #0E0EFF;
            text-align: justify;
            margin-bottom: 0px;
        }
    </style>
@endsection