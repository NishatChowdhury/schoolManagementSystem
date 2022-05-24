<section class="pt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>
                    <small class="text-primary d-block">
                        Chairman
                    </small>
                    Message
                </h2>
                {!! substr($content->where('name','president message')->first()->content,0,1000) !!}
                <a href="{{ action('FrontController@page','message-from-chairman') }}">...more</a>
            </div>
            <div class="col-md-6 mt-3">
                {{--<img src="assets/img/avatar/1_1.png" alt="">--}}
                <img src="{{ asset('assets/img/pages/') }}/{{ $content->where('name','president message')->first()->image }}" alt="">
            </div>
        </div>
    </div>
</section>
