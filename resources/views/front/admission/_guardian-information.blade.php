<div class="tab-pane fade" id="guardian-information" role="tabpanel">
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="row form-group">
                    <label for="example-number-input" class="col-2 col-form-label text-right">Father Name</label>
                    <div class="col-10">
                        {{ Form::text('father',null,['class'=>'form-control','id'=>'input-father']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-datetime-local-input" class="col-2 col-form-label text-right">Mother Name</label>
                    <div class="col-10">
                        {{ Form::text('mother',null,['class'=>'form-control','id'=>'input-mother']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-date-input" class="col-2 col-form-label text-right">Father Occupation</label>
                    <div class="col-10">
                        {{ Form::text('father_occupation',null,['class'=>'form-control','id'=>'input-father-occupation']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-month-input" class="col-2 col-form-label text-right">Guardian Name</label>
                    <div class="col-10">
                        {{ Form::text('guardian_name',null,['class'=>'form-control','id'=>'input-guardian']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-month-input" class="col-2 col-form-label text-right">Relation With Guardian</label>
                    <div class="col-10">
                        {{ Form::text('relation_with_guardian',null,['class'=>'form-control','id'=>'input-relation-with-guardian']) }}
                    </div>
                </div>

{{--                <div class="row form-group">--}}
{{--                    <label for="example-week-input" class="col-2 col-form-label text-right">Other Guardian</label>--}}
{{--                    <div class="col-10">--}}
{{--                        {{ Form::text('other_guardian',null,['class'=>'form-control','id'=>'input-other-guardian']) }}--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="row form-group">
                    <label for="example-time-input" class="col-2 col-form-label text-right">Guardian National ID</label>
                    <div class="col-10">
                        {{ Form::text('guardian_nid',null,['class'=>'form-control','id'=>'input-guardian-nid']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Mobile</label>
                    <div class="col-10">
                        {{ Form::text('mobile',null,['class'=>'form-control','id'=>'input-mobile']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Email</label>
                    <div class="col-10">
                        {{ Form::text('email',null,['class'=>'form-control','id'=>'input-email']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">Guardian Yearly Income</label>
                    <div class="col-10">
                        {{ Form::text('yearly_income',null,['class'=>'form-control','id'=>'input-yearly-income']) }}
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
