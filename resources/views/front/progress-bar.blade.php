<section class="paddingTop-60 paddingBottom-100" data-dark-overlay="6" style="background-color: rgb(151, 161, 170);">
    <div class="container">
        <div class="row text-center text-white">

            <div class="col-lg-3 col-md-6 mt-5 wow zoomIn" data-wow-delay=".1">
                <h2 class="h1 text-primary">
                    {{ \App\Student::all()->count() }}
                </h2>
                <p class="lead">
                    Students
                </p>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 wow zoomIn" data-wow-delay=".2">
                <h2 class="h1 text-primary">
                    {{ \App\AcademicClass::all()->count() }}
                </h2>
                <p class="lead">
                    Classes
                </p>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 wow zoomIn" data-wow-delay=".3">
                <h2 class="h1 text-primary">
                    235K
                </h2>
                <p class="lead">
                   Attendance
                </p>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 wow zoomIn" data-wow-delay=".4">
                <h2 class="h1 text-primary">
                    {{ \App\Staff::all()->count() }}
                </h2>
                <p class="lead">
                    Teachers & Staff
                </p>
            </div>

        </div> <!-- END row-->
    </div> <!-- END container-->
</section>
