@php
  $intro = $content->where('name','introduction')->first();
@endphp
<section class="padding-y-100 bg-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row align-items-center">
{{--                    <div class="col-md-6 my-5">--}}
{{--                        <div class="position-relative">--}}
{{--                            <img class="rounded w-100" src="{{ asset('assets/img/pages') }}/{{ $intro->image }}" alt="">--}}
{{--                            <a href="https://www.youtube.com/watch?v=7e90gBu4pas" data-fancybox class="iconbox iconbox-lg bg-white position-absolute absolute-center">--}}
{{--                                <i class="ti-control-play text-primary"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-md-12 mt-4">
                        {!! $intro->content !!}
{{--                        <h2>--}}
{{--                            <small class="d-block text-white">Welcome to</small>--}}
{{--                            <span class="text-white">Educati</span> School--}}
{{--                        </h2>--}}
{{--                        <p class="my-4 text-white">--}}
{{--                            Investig tiones demons travge wunt ectores legere lkurus quod legunt saepiu clartas est consectetur adipi sicing elitsed kdo eusmod tempor cididunt wuti labore.--}}
{{--                        </p>--}}
                        <a href="{{ action('FrontController@page','history') }}" class="btn btn-outline-white-hover">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-5 mt-md-0">
                <div class="card shadow-v2 z-index-5" data-offset-top-xl="-160">
                    <div class="card-header text-white border-bottom-0" style="background-color: #97a1aa">
                        <span class="lead font-semiBold text-uppercase">
                            Notice Board
                         </span>
                    </div>

                    @foreach($notices as $notice)
                        <div class="p-4 border-bottom wow fadeInUp">
                            <p class="text-warning mb-1">
                                @if($notice->start)
                                    {{ $notice->start->format('Y-m-d') }}
                                @else
                                    {{ $notice->created_at->format('Y-m-d') }}
                                @endif
                            </p>
                            <a href="{{ action('FrontController@noticeDetails',$notice->id) }}" class="text-info">
                                {{ strip_tags($notice->title) }}
                            </a>
                        </div>
                    @endforeach

                    <div class="p-4">
                        <a href="{{ action('FrontController@notice') }}" class="btn btn-link pl-0">
                            View All Notices
                        </a>
                    </div>
                </div>
            </div>
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>
