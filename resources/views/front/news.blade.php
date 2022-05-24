<section class="bg-light-v2 padding-y-100">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-md-4">
                <h2 class="mb-4">
                    Campus News
                </h2>
                <div class="width-3rem height-4 rounded bg-primary mx-auto"></div>
            </div>
        </div> <!-- END row-->
        <div class="row">
            <div class="col-lg-6">
                @foreach($newses as $news)
                <div class="list-card align-items-center marginTop-30">
                    <div class="col-md-4 px-md-0">
                        <img class="w-100" src="{{ asset('assets/files/notice') }}/{{ $news->file }}" alt="">
                    </div>
                    <div class="col-md-8 p-4">
                        <p class="text-primary">{{ $news->start->format('F d, Y') }}</p>
                        <a href="{{ action('FrontController@newsDetails',$news->id) }}" class="h5">
                            {{ $news->title }}
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            @if($latestNews)
            <div class="col-lg-6 marginTop-30">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('assets/files/notice') }}/{{ $latestNews->file }}" alt="">
                    <div class="card-body">
                        <p class="text-primary">
                            {{ $latestNews->start->format('F d, Y') }}
                        </p>
                        <h4>
                            <a href="#">
                                {{ $latestNews->title }}
                            </a>
                        </h4>
                        <p>
                            {{ substr($latestNews->description,0,100) }}
                        </p>
                        <a href="{{ action('FrontController@newsDetails',$latestNews) }}" class="btn btn-outline-primary">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            @endif
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>
