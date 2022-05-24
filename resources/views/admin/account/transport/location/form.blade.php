
    <div class="card">
        <div class="col-md-12 col-sm-12" style="margin-top: 20px; ">
            <div class="card-header">
                <h5 class="card-title">Transport Location</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 control-label" style="font-weight: 500; text-align: right">Name*</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Location Name']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-4 control-label" style="font-weight: 500; text-align: right">Description*</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                {!! Form::text('description', null, ['class'=>'form-control', 'placeholder'=>'Location Description']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-4 control-label" style="font-weight: 500; text-align: right">Fare*</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                {!! Form::number('amount', null, ['class'=>'form-control', 'placeholder'=>'Location Fare']) !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>




