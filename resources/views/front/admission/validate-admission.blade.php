@extends('layouts.front-inner')

@section('title','Online Admission Form')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>Validate Admission</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Admission</a>
                        </li>
                        <li class="breadcrumb-item">
                            {{ ucfirst('Validate') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-20 border-bottom">

        <div class="col-12 text-center">
            <h4>Validate Admission</h4>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <span style="color:indianred">{{ $error }}</span>
                @endforeach
            @endif
        </div>

        {{ Form::open(['action'=>'FrontController@admissionForm','method'=>'get']) }}


        <div class="container">
            <div class="row">

                <div class="col-12 mx-auto">

                    <div class="row form-group">
                        <label for="example-text-input" class="col-2 col-form-label text-right">SSC Roll Number</label>
                        <div class="col-10">
                            {{ Form::text('ssc_roll',null,['class'=>'form-control','id'=>'Enter SSC Roll']) }}
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-12 mx-auto">
                            <div class="text-center form-group">
                                <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#modal__large">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- END container -->

        {{ Form::close() }}

    </section>

@stop

@section('script')
    <script>
        $(".form-control").on('keyup',function(){
            $("#name").text($("#input-name").val())
            $("#gender").text($("#input-gender option:selected").text())
            $("#dob").text($("#example-date-input").val())
            $("#bcn").text($("#input-bcn").val())
            $("#blood").text($("#input-blood option:selected").text())
            $("#religion").text($("#input-religion option:selected").text())
            $("#address").text($("#input-address").val())

            $("#father").text($("#input-father").val())
            $("#mother").text($("#input-mother").val())
            $("#father-occupation").text($("#input-father-occupation").val())
            $("#mother-occupation").text($("#input-mother-occupation").val())
            $("#other-guardian").text($("#input-other-guardian").val())
            $("#guardian-national-id").text($("#input-guardian-national-id").val())
            $("#mobile").text($("#input-mobile").val())
            $("#email").text($("#input-email").val())
            $("#yearly-income").text($("#input-yearly-income").val())
            $("#guardian-address").text($("#input-guardian-address").val())
        })
    </script>

    <script>
        $(document).on('keyup', function () {
            var academicYear = $('.year').val();
            $.ajax({
                url:"{{url('/load_online_student_id')}}",
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
