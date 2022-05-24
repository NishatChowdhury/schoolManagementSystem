<div class="tab-pane fade" id="ssc-information" role="tabpanel">
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="row form-group">
                    <label for="example-number-input" class="col-2 col-form-label text-right">Board</label>
                    <div class="col-10">
                        {{ Form::text('ssc_board',null,['class'=>'form-control','id'=>'input-ssc-board','readonly']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-datetime-local-input" class="col-2 col-form-label text-right">Passing Year</label>
                    <div class="col-10">
                        {{ Form::text('ssc_year',null,['class'=>'form-control','id'=>'input-ssc-year','readonly']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-date-input" class="col-2 col-form-label text-right">SSC Roll</label>
                    <div class="col-10">
                        {{ Form::text('ssc_roll',null,['class'=>'form-control','id'=>'input-ssc-roll','readonly']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-month-input" class="col-2 col-form-label text-right">SSC Registration</label>
                    <div class="col-10">
                        {{ Form::text('ssc_registration',null,['class'=>'form-control','id'=>'input-ssc-registration']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-week-input" class="col-2 col-form-label text-right">SSC Session</label>
                    <div class="col-10">
                        {{ Form::text('ssc_session',null,['class'=>'form-control','id'=>'input-ssc-session']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-time-input" class="col-2 col-form-label text-right">Student Type</label>
                    <div class="col-10">
                        {{ Form::text('student_type',null,['class'=>'form-control','id'=>'input-student-type']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">GPA</label>
                    <div class="col-10">
                        {{ Form::text('ssc_gpa',null,['class'=>'form-control','id'=>'input-gpa']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">SSC Group</label>
                    <div class="col-10">
                        {{ Form::text('ssc_group',null,['class'=>'form-control','id'=>'input-ssc-group']) }}
                    </div>
                </div>

                <div class="row form-group">
                    <label for="example-textarea" class="col-2 col-form-label text-right">SSC School</label>
                    <div class="col-10">
                        {{ Form::text('ssc_school',null,['class'=>'form-control','id'=>'input-ssc-school']) }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
