<div class="container">
    <div class="row align-items-center justify-content-between mx-0">
        <ul class="list-inline d-none d-lg-block mb-0">
            <li class="list-inline-item mr-3">
                <div class="d-flex align-items-center">
                    <i class="ti-email mr-2"></i>
                    <a href="mailto:{{ siteConfig('email') }}">{{ siteConfig('email') }}</a>
                </div>
            </li>
            <li class="list-inline-item mr-3">
                <div class="d-flex align-items-center">
                    <i class="fas fa-phone-square-alt mr-2"></i>
                    <a href="tel:{{  siteConfig('phone') }}">{{  siteConfig('phone') }}</a>
                </div>
            </li>
        </ul>
        <ul class="list-inline mb-0">
            <li class="list-inline-item mr-0 p-3 border-right border-left border-white-0_1">
                <span>EIIN: {{ siteConfig('eiin') }}</span>
            </li>
            <li class="list-inline-item mr-0 p-3 border-right border-white-0_1">
                <span>Institute Code: {{ siteConfig('code') }}</span>
            </li>
        </ul>
        <ul class="list-inline mb-0">
            <li class="list-inline-item mr-0 p-md-3 p-2 border-right border-left border-white-0_1">
                <a href="{{ url('student/login') }}">Login</a>
            </li>
        </ul>
    </div> <!-- END END row-->
</div> <!-- END container-->
