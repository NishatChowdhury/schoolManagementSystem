<section class="" data-primary-overlay="0" style="background-color:{{ themeConfig('header_background') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-2 text-center d-md-flex align-items-center">
                <div class="navbar-brand">
                    <!--                            <a class="logo-default" :href="'/'"><img alt="" :src="'http://'+asset+'/assets/img/logos/'+title.logo" width="75" height="75"></a>-->
                    <a class="logo-default" href="{{ url('/') }}">
                        <img alt="" src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}" height="{{ siteConfig('logo_height') }}">
                    </a>
                </div>
            </div>
            <div class="col-md-10 text-blue text-center">
                <h2 class="mb-4">
                    <span style="color:{{ siteConfig('name_color') }};font-size:{{ siteConfig('name_size') }}px;font-family:{{ siteConfig('name_font') }};">{{ siteConfig('name') }}</span><br>
                    <span style="color:{{ siteConfig('bn_color') }};font-size:{{ siteConfig('bn_size') }}px;font-family:{{ siteConfig('bn_font') }};">{{ siteConfig('bn') }}</span>
                </h2>
            </div>
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>
