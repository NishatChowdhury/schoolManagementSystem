<div class="tab-pane fade" id="subjects" role="tabpanel">
    <div class="container">
        <div class="row">

            <div class="col-12 mx-auto">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="text-center">Compulsory</h3>
                        <div class="row form-group">
                            {{ Form::select('fc',[1=>'Bangla'],null,['class'=>'form-control','id'=>'input-fc','required']) }}
                        </div>
                        <div class="row form-group">
                            {{ Form::select('sc',[2=>'English'],null,['class'=>'form-control','id'=>'input-sc','required']) }}
                        </div>
                        <div class="row form-group">
                            {{ Form::select('tc',[3=>'ICT'],null,['class'=>'form-control','id'=>'input-tc','required']) }}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h3 class="text-center">Selective/Elective</h3>
                        @php $subjects = isset($student) ? json_decode($student->subjects,true) : null @endphp
                        <div class="row form-group">
                            {{ Form::select('fs',$selective,$subjects ? $subjects['selective'][0] : null,['class'=>'form-control','id'=>'input-fs','placeholder'=>'select 1st selective subject','required']) }}
                        </div>
                        <div class="row form-group">
                            {{ Form::select('ss',$selective,$subjects ? $subjects['selective'][1] : null,['class'=>'form-control','id'=>'input-ss','placeholder'=>'select 2nd selective subject','required']) }}
                        </div>
                        <div class="row form-group">
                            {{ Form::select('ts',$selective,$subjects ? $subjects['selective'][2] : null,['class'=>'form-control','id'=>'input-ts','placeholder'=>'select 3rd selective subject','required']) }}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h3 class="text-center">Optional</h3>
                        <div class="row form-group">
                            {{ Form::select('optional',$optional,$subjects ? $subjects['optional'][0] : null,['class'=>'form-control','id'=>'input-optional','placeholder'=>'select optional subject','required']) }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
