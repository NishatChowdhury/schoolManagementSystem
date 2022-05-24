<section class="pt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                {{--<img src="assets/img/avatar/1_1.png" alt="">--}}
                <img src="{{ asset('assets/img/pages/') }}/{{ $content->where('name','principal message')->first()->image }}" alt="">
            </div>
            <div class="col-md-6 mt-3">
{{--                <h2>--}}
{{--                    <small class="text-warning d-block">--}}
{{--                        Principal Message--}}
{{--                    </small>--}}
{{--                    Principal Message--}}
{{--                </h2>--}}
                {!! substr($content->where('name','principal message')->first()->content,0,2000) !!}
                <a href="{{ action('FrontController@page','message-from-principal') }}">...more</a>
                {{--<h2>--}}
                {{--<small class="text-primary d-block">--}}
                {{--Hello, and--}}
                {{--</small>--}}
                {{--welcome to Harvard.--}}
                {{--</h2>--}}
                {{--<p class="lead">--}}
                {{--People make a university great, so whether you are a prospective student, current student, professor.--}}
                {{--</p>--}}
                {{--<p>--}}
                {{--Investig ationes demons trave wanrunt lectores legere liushgfy quod legunt saeph claritas nvestig ationes demons trave rugngt investiga legere liushgfy quod legunt saeph claritas nvestig ationes.--}}
                {{--</p>--}}
                {{--<h4 class="mt-2">--}}
                {{--Drew Faust--}}
                {{--</h4>--}}
                {{--<p>--}}
                {{--President of Chipatali Madrasha <br> Lincoln Professor of History--}}
                {{--</p>--}}
                {{--<img src="assets/img/sign.png" alt="">--}}
            </div>
        </div>
    </div>
</section>
