<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($sliders as $key => $slider)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
{{--        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>--}}
{{--        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach($sliders as $key => $slider)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <img src="{{ asset('assets/img/sliders') }}/{{ $slider->image }}" class="d-block w-100" alt="{{ $slider->title }}">
        </div>
        @endforeach
{{--        <div class="carousel-item">--}}
{{--            <img src="https://bnsck.edu.bd/assets/img/sliders/1602503592received_2468120166835502.jpeg" class="d-block w-100" alt="...">--}}
{{--        </div>--}}
{{--        <div class="carousel-item">--}}
{{--            <img src="https://bnsck.edu.bd/assets/img/sliders/1602503536received_162186855233804.jpeg" class="d-block w-100" alt="...">--}}
{{--        </div>--}}
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
