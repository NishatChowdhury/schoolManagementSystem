<div class="tab-pane fade" id="photograph" role="tabpanel">
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="row form-group">
                    <label for="example-number-input" class="col-2 col-form-label text-right">Upload Image</label>
                    <div class="col-6">
                        <input name="pic" type="file" {{ isset($student) ? '' : 'required' }}>
                    </div>
                    <div class="col-3">
                        @isset($student)
                        <img src="{{ asset('assets/img/students') }}/{{ $student->image }}" alt="" class="img-thumbnail">
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
