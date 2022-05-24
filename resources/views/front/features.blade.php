<section class="bg-light-v2 paddingTop-80 paddingBottom-100">
    <div class="container">
        <div class="row text-center">
            @foreach($features as $feature)
            <div class="col-md-6 col-lg-4 marginTop-30">
                <a href="{{ url($feature->menu->uri ?? '') }}" class="card shadow-v1 align-items-center p-5 hover:transformTop">
                    <img src="{{ asset('assets/img/features/') }}/{{ $feature->image }}" alt="{{ $feature->name }}" height="80">
                    <h4 class="mt-2">
                        {{ $feature->name }}
                    </h4>
                </a>
            </div>
            @endforeach()
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>   <!-- END section-->
