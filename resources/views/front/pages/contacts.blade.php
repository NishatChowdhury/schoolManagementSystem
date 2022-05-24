@extends('layouts.front-inner')

@section('title','Contacts')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>Contact Us</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">Contact</a>
                        </li>
{{--                        <li class="breadcrumb-item">--}}
{{--                            <a href="#"> Elements</a>--}}
{{--                        </li>--}}
{{--                        <li class="breadcrumb-item">--}}
{{--                            Contact Us--}}
{{--                        </li>--}}
                    </ol>
                </div>
            </div>
        </div>
    </div>

{{--    <section class="padding-y-100 border-bottom">--}}
{{--        <div class="container">--}}
{{--            <div class="row align-items-center">--}}

                <div class="py-5 shadow-v2 position-relative">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-4 col-md-6 mt-4">
                                <div class="media">
                                    <span class="iconbox iconbox-md bg-primary text-white"><i class="fas fa-phone-square-alt"></i></span>
                                    <div class="media-body ml-3">
                                        <h5 class="mb-0">{{ siteConfig('phone') }}</h5>
                                        <p>Call Us (9AM-2PM)</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 mt-4">
                                <div class="media">
                                    <span class="iconbox iconbox-md bg-primary text-white"><i class="ti-email"></i></span>
                                    <div class="media-body ml-3">
                                        <a href="" class="h5">{{ siteConfig('email') }}</a>
{{--                                        <p>Call Us (9AM-10PM)</p>--}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 mt-4">
                                <div class="media">
                                    <span class="iconbox iconbox-md bg-primary text-white"><i class="ti-location-pin"></i></span>
                                    <div class="media-body ml-3">
                                        <h5 class="mb-0">Chittagong, Bangladesh</h5>
                                        <p>{{ siteConfig('address') }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <section class="padding-y-100 bg-light-v2">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center mb-5">
                                <h2>
                                    Send Message
                                </h2>
                                <div class="width-4rem height-4 bg-primary my-2 mx-auto rounded"></div>
                            </div>
                            <div class="col-12 text-center">
                                <div id="success">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                </div>

                                <form action="{{ action('MessagesController@store') }}" method="POST" class="card p-4 p-md-5 shadow-v1">
                                    @csrf
{{--                                    <p class="lead mt-2">--}}
{{--                                        Investig tiones demons travge wunt ectores legere lkurus quod legunt saepiu clear <br> tasest consectetur adipi sicing elitsed eusmod tempor cididunt.--}}
{{--                                    </p>--}}
                                    <div class="row mt-5 mx-0">
                                        <div class="col-md-4 mb-4">
                                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                                            @if($errors->has('name'))
                                                <p class="danger" style="font-size: 12px; color: red">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                                            @if($errors->has('email'))
                                                <p class='is-invalid' style="font-size: 12px; color: red">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <input type="text" name="phone" class="form-control" placeholder="Phone number" required>
                                            @if($errors->has('phone'))
                                                <p class="help is-danger" style="font-size: 12px; color: red">{{ $errors->first('phone') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-12">
                                            <textarea  name="message" class="form-control" placeholder="Message" rows="7" required></textarea>
                                            @if($errors->has('message'))
                                                <p class="help is-danger" style="font-size: 12px; color: red">{{ $errors->first('message') }}</p>
                                            @endif
                                            <button type="submit" class="btn btn-primary mt-4">Send Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div> <!-- END row-->
                    </div> <!-- END container-->
                </section>

    {!! siteConfig('map') !!}

{{--                <div class="google-map" data-address="Harvard University" data-zoom="14" data-key="AIzaSyB0uuKeEkPfAo7EUINYPQs3bzXn7AabgJI" style="height:450px;"></div>--}}


{{--            </div> <!-- END row-->--}}
{{--        </div> <!-- END container-->--}}
{{--    </section>--}}

@stop

@section('script')
    <script>
        $(document).ready(function () {
            $('#success').fadeOut(3000);
        });
    </script>
@stop
