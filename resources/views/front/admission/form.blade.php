<div class="tab-content">
    @if($errors->any)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @include('front.admission._student-information')
    {{--    @include('front.admission._guardian-information')--}}
    @include('front.admission._ssc-information')
    @include('front.admission._subjects')
    @include('front.admission._photograph')
    @include('front.admission._bank-slip')

</div>

<hr>

<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="text-center form-group">
{{--                <button type="button" id="submit-button" class="btn btn-success" data-toggle="modal" data-target="#modal__large">Submit</button>--}}
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal large-->
<div class="modal fade" id="modal__large" tabindex="-1" role="dialog" aria-labelledby="modal__large" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Review Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close font-size-14"></i>
                </button>
            </div>
            <div class="modal-body py-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">Name:</label>
                            <label class="text-black-0_9" id="name"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">Gender:</label>
                            <label class="text-black-0_9" id="gender"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">Date of Birth:</label>
                            <label class="text-black-0_9" id="dob"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">Birth Certificate Number:</label>
                            <label class="text-black-0_9" id="bcn"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">Blood Group:</label>
                            <label class="text-black-0_9" id="blood"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">Religion:</label>
                            <label class="text-black-0_9" id="religion"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">Address:</label>
                            <label class="text-black-0_9" id="address"></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">Father Name:</label>
                            <label class="text-black-0_9" id="father"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">Mother Name:</label>
                            <label class="text-black-0_9" id="mother"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">Father Occupation:</label>
                            <label class="text-black-0_9" id="father-occupation"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">Mother Occupation:</label>
                            <label class="text-black-0_9" id="mother-occupation"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">Other Guardian:</label>
                            <label class="text-black-0_9" id="other-guardian"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">Guardian National ID:</label>
                            <label class="text-black-0_9" id="guardian-national-id"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">Mobile:</label>
                            <label class="text-black-0_9" id="mobile"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">Email:</label>
                            <label class="text-black-0_9" id="email"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">Guardian Yearly Income:</label>
                            <label class="text-black-0_9" id="yearly-income"></label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label text-black-50">Address:</label>
                            <label class="text-black-0_9" id="guardian-address"></label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer py-4 text-center">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Edit</button>
                <button type="submit" class="btn btn-success">Confirm Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Large End -->
